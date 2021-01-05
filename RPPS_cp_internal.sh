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
case $1 in
	'')
	for d in */; do sudo cp -u index.php "$d"; done;;
	'force')
	for d in */; do sudo cp index.php "$d"; done;;
	*)
	echo $USAGE; exit 1;;
esac
sudo chown -R $(id -u):www-data $SCRIPT_DIR/internal/

# -----------------------------------------------------------------
