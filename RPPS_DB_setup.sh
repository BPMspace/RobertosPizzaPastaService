#!/bin/bash
# ------------------------------------------------------------------
# [Author] BPMSPACE
#          RPPS_DB_setup.sh
# ------------------------------------------------------------------

VERSION=0.1.0
SUBJECT=8e129c9f-b136-4f3e-8da4-8609458765497
USAGE="Usage: RPPS_DB_setup [UP/DOWN]"
# --- Options processing -------------------------------------------
if [ $# -gt 1 ] ; then
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
cd $SCRIPT_DIR;

case $1 in

  'up'|'')
	docker network create SIM_RPPS;
    docker-compose -f docker-compose.DB.yml up --force-recreate  -d
    ;;

  'down')
    docker-compose --remove-orphans down;
    ;;

  *)
    echo $USAGE ; exit 1 
    ;;
esac

