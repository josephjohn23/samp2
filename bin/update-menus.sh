#!/bin/bash
#SQL="delete from health_check_historical where store_timestamp < DATE(DATE_SUB(NOW(), INTERVAL 7 DAY));"

#READ YML FILE
parse_yaml() {
   local prefix=$2
   local s='[[:space:]]*' w='[a-zA-Z0-9_]*' fs=$(echo @|tr @ '\034')
   sed -ne "s|^\($s\)\($w\)$s:$s\"\(.*\)\"$s\$|\1$fs\2$fs\3|p" \
        -e "s|^\($s\)\($w\)$s:$s\(.*\)$s\$|\1$fs\2$fs\3|p"  $1 |
   awk -F$fs '{
      indent = length($1)/2;
      vname[indent] = $2;
      for (i in vname) {if (i > indent) {delete vname[i]}}
      if (length($3) > 0) {
         vn=""; for (i=0; i<indent; i++) {vn=(vn)(vname[i])("_")}
         printf("%s%s%s=\"%s\"\n", "'$prefix'",vn, $2, $3);
      }
   }'
}

eval $(parse_yaml ../app/config/parameters.yml "config__")

#ACCESS YML
MYSQL_HOST=$config__parameters__database_host
MYSQL_USER=$config__parameters__database_user
MYSQL_PASS=$config__parameters__database_password
MYSQL_DB=$config__parameters__database_name

#echo "$SQL | /usr/bin/mysql --user=$MYSQL_USER --host=$MYSQL_HOST --password=$MYSQL_PASS $MYSQL_DB"
#echo $SQL | /usr/bin/mysql --user=$MYSQL_USER --host=$MYSQL_HOST --password=$MYSQL_PASS $MYSQL_DB
#echo `mysql -u$MYSQL_USER -p$MYSQL_PASS -h$MYSQL_HOST $MYSQL_DB -e "$SQL"`
#echo mysql -u$MYSQL_USER -p$MYSQL_PASS -h$MYSQL_HOST $MYSQL_DB -e "$SQL";

if ! [ -f ../sqls/menus.sql ];
then
echo `mysql -u$MYSQL_USER -p$MYSQL_PASS -h$MYSQL_HOST $MYSQL_DB < ../sqls/menus.sql`
echo `Menu SQL found! Updating...`
fi

echo `mysqldump -u$MYSQL_USER -p$MYSQL_PASS -h$MYSQL_HOST $MYSQL_DB menu_parent menu_child > ../sqls/menus.sql`
echo 'Completed menu update!'
