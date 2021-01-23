#!/bin/bash
# ------------------------------------------------------------------
# [Author] BPMSPACE
#          RPPS_cp_internal.sh
# ------------------------------------------------------------------

VERSION=0.1.0
SUBJECT=86e2e586-fc62-4118-8efa-3d1a1cd88b26
USAGE="Usage: RPPS_cp_internal [force]"
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
cd $SCRIPT_DIR/internal/
while :; do 
	case $1 in
		'')
		for d in */; 
		do
			sudo cp -u .htaccess "$d"; 
			sudo cp -u .htpasswd "$d"; 
			sudo cp -u index.php "$d"; 
			sudo cp -u service.php "$d"; 
			sudo cp -u service_IN.inc.php "$d"; 
			sudo cp -u service_OUT.inc.php "$d"; 
			sudo cp -u kitchen.php "$d"; 
			sudo cp -u kitchen_IN.inc.php "$d"; 
			sudo cp -u kitchen_OUT.inc.php "$d"; 
			sudo cp -u delivery.php "$d"; 
			sudo cp -u delivery_IN.inc.php "$d"; 
			sudo cp -u delivery_OUT.inc.php "$d"; 
			sudo cp -u bodypart2.inc.php "$d"; 
		done;;
		'force')
		for d in */; 
		do 
			sudo cp  .htaccess "$d"; 
			sudo cp  .htpasswd "$d"; 
			sudo cp  index.php "$d"; 
			sudo cp  service.php "$d"; 
			sudo cp  service_IN.inc.php "$d";
			sudo cp  service_OUT.inc.php "$d"; 
			sudo cp  kitchen.php "$d"; 
			sudo cp  kitchen_OUT.inc.php "$d"; 
			sudo cp  kitchen_IN.inc.php "$d";
			sudo cp  delivery.php "$d"; 
			sudo cp  delivery_OUT.inc.php "$d"; 
			sudo cp  delivery_IN.inc.php "$d";
			sudo cp  bodypart2.inc.php "$d"; 
		done;;
		*)
		echo $USAGE; exit 1;;
	esac
tput clear;
seq 1 10| while read i; do echo -en "\r" ; done;
echo -en "\\r" $(date +%x_%r)' - Do copy loop to internal with parameter "'$1'" to sub folder - Press <CTRL+C> to exit.'; sleep 1;  done
# -----------------------------------------------------------------
