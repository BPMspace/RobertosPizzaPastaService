#!/bin/bash
# ------------------------------------------------------------------
# [Author] BPMSPACE
#          RPPS_setup.sh
# ------------------------------------------------------------------

VERSION=0.1.0
SUBJECT=8e129c9f-b136-4f3e-8da4-8c3d9b9144bf
USAGE="Usage: RPPS_setup [NUMBER_OF_TEAMS max 5] [up/down]"
# --- Options processing -------------------------------------------
if [ $# -gt 2 ] ; then
    echo $USAGE
    exit 1;
fi
: '
while getopts ":i:vh" optname
  do
    case "$optname" in
      "v")
        echo "Version $VERSION"
        exit 0;
        ;;
      "-d")
        echo "Delete and restore demo Data only";
		param1=demo
        ;;
      "h")
        echo $USAGE
        exit 0;
        ;;
      "?")
        echo "Unknown option $OPTARG"
        exit 0;
        ;;
      ":")
        echo "No argument value for option $OPTARG"
        exit 0;
        ;;
      *)
        echo "Unknown error while processing options"
        exit 0;
        ;;
    esac
  done

shift $(($OPTIND - 1))
'
# --- Locks -------------------------------------------------------
LOCK_FILE=/tmp/$SUBJECT.lock
if [ -f "$LOCK_FILE" ]; then
   echo "Script is already running"
   exit
fi

trap "rm -f $LOCK_FILE" EXIT 
touch $LOCK_FILE

# --- Body --------------------------------------------------------
#  SCRIPT LOGIC GOES HERE
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )";
CERT_DIR=/etc/letsencrypt/live/bpmspace.net/;
cd $SCRIPT_DIR;
unset  Number_Pizza_Team;
unset  Port_Pizza_Team_web;
unset  Port_Pizza_Team_ServiceDesk;
unset  Port_Pizza_Team_Kitchen;
unset  Port_Pizza_Team_Driver;

sudo cp $CERT_DIR/cert.pem $SCRIPT_DIR/dockerconf/apache2/certbot.pem
sudo cp $CERT_DIR/privkey.pem $SCRIPT_DIR/dockerconf/apache2/certbot_priv.pem

cd $SCRIPT_DIR/Dockerfile
docker build -t bpmspace/rpps-apache-php:latest -f $SCRIPT_DIR//Dockerfile/Dockerfile.apache_php .
cd $SCRIPT_DIR

if [ $# -eq 0 ]
  then
    END=1;
    echo "Create environnement for $END Team"
  else
    END=$1;

    case $1 in
    ''|*[!0-9]*) echo $USAGE ; exit 1 ;;
    *) 
        if  [ $1 -gt 5 ]
        then 
            echo $USAGE;
            exit 1
        fi 
        echo "Create environnement for $END Teams" ;;
esac
fi

for i in $(seq 1 $END); do 

export Number_Pizza_Team=$i;
export Project_Name_Pizza_Team=RPPS_${i};
export Port_Pizza_Team_web=6${i}40;
export Port_Pizza_Team_ServiceDesk=6${i}42;
export Port_Pizza_Team_Kitchen=6${i}43;
export Port_Pizza_Team_Driver=6${i}44;
docker network create pizza.${Number_Pizza_Team};
echo "Teams#: " $Project_Name_Pizza_Team;

case $2 in

  'up'|'')
    mkdir -p $SCRIPT_DIR/internal/internal_$1;
    docker network create pizza.${Number_Pizza_Team};
    docker-compose -p $Project_Name_Pizza_Team up -d
    ;;

  'down')
    docker-compose -p $Project_Name_Pizza_Team down;
    docker network rm  pizza.${Number_Pizza_Team};
    docker network prune --force;
    
    ;;

  *)
    echo $USAGE ; exit 1 
    ;;
esac
done

unset  Number_Pizza_Team;
unset  Port_Pizza_Team_web;
unset  Port_Pizza_Team_ServiceDesk;
unset  Port_Pizza_Team_Kitchen;
unset  Port_Pizza_Team_Driver;

sudo chown -R $(id -u):www-data $SCRIPT_DIR/internal/
sudo chown -R $(id -u):www-data $SCRIPT_DIR/webroot/
# -----------------------------------------------------------------
