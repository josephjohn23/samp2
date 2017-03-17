#!/bin/bash

cd "$(dirname "$0")"

APPPATH=../app
./save-menus-to-db.sh
php $APPPATH/console cache:clear --env=prod --no-debug
php $APPPATH/console cache:clear --env=dev --no-debug
