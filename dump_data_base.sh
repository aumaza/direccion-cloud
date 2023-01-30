#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="admin_files-$fecha.sql"
destination="app/static/documents/"
mysqldump --user=admin_files --password=admin_files -h localhost admin_files > $archivo
chmod 777 $archivo
mv $archivo $destination


