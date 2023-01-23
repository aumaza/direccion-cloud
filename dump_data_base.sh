#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="admin_files-$fecha.sql"
destination="app/static/documents/"
mysqldump --user=root --password=slack142 -h slackzone.ddns.net admin_files > $archivo
chmod 777 $archivo
mv $archivo $destination


