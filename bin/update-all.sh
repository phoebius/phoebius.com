#!/bin/sh

cd ..

git reset --hard

git pull origin master

git submodule update

bin/make-archives.sh
