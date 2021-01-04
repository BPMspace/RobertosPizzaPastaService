#!/bin/bash
# ------------------------------------------------------------------
# [Author] BPMSPACE
#          RPPS_setup.sh
# ------------------------------------------------------------------

VERSION=0.1.0
SUBJECT=8e129c9f-b136-4f3e-8da4-8c3d9b9144bf
USAGE="Usage: RPPS_setup [NUMBER_OF_TEAMS max 5]"
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



echo $i;


done

# -----------------------------------------------------------------
