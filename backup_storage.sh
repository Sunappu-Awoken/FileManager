#!/bin/bash
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_DIR=/home/peaceysy_test/backups/storage
STORAGE_DIR=/home/peaceysy_test/public_html/_sub/tasklist.peacey.us/laravel/storage/app/public
mkdir -p "$BACKUP_DIR"
tar -czf "$BACKUP_DIR/storage_$TIMESTAMP.tar.gz" -C "$STORAGE_DIR" .
# Delete archives older than 7 days
find "$BACKUP_DIR" -type f -mtime +7 -name '*.tar.gz' -delete
