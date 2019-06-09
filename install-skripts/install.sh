#!/bin/bash

echo "not finished, use php scripts!";
exit;

echo -e "Are you sure? (y/n)\nYou should manually make a backup before!"
read confirmInstallation
if [ "${confirmInstallation}" != "y" ]; then
  echo "not installing this"
  exit
fi

echo -e "Use symlinks? (y/n)\nIf yes, the files will be symlinked, otherwise simply copied"
read confirmSymlinks
if [ "${confirmInstallation}" != "y" ]; then
  echo "Using symlinks..."
fi

