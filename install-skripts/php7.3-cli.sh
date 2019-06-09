#!/bin/bash

if [ `whoami` != "root" ]; then
  echo "Must run as root"
  exit 1
fi

apt install software-properties-common
add-apt-repository ppa:ondrej/php -y
apt update

apt install php7.3 -y

