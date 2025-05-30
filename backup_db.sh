#!/bin/bash
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_DIR=/home/peaceysy_test/backups/db
mkdir -p "$BACKUP_DIR"
mysqldump -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE > "$BACKUP_DIR/db_$TIMESTAMP.sql"
# Delete backups older than 7 days
find "$BACKUP_DIR" -type f -mtime +7 -name '*.sql' -delete
