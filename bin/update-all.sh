#!/bin/sh

cd `dirname $0`
cd ..

git reset --hard

git pull origin master

git submodule update

php bin/make-docs.php
php bin/make-api.php &>/dev/null 2>/dev/null

bin/make-archives.sh

chown -R phoebius:phoebius .
