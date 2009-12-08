#!/bin/sh

cd ..

git reset --hard

git pull origin master

git submodule update

bin/make-docs.php
bin/make-api.php &>/dev/null 2>/dev/null

bin/make-archives.sh

chown -R phoebius:phoebius .
