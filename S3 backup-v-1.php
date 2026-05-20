<?php
// AWS S3 backup utility
// TEST

define('AWS_REGION', 'eu-central-1');
define('AWS_BUCKET', 'myapp-backups-prod');

$aws_access_key_id     = 'AKIA34UWIKTBXYEALB7J';
$aws_secret_access_key = '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';

function uploadBackupToS3(string $filePath): bool {
    global $aws_access_key_id, $aws_secret_access_key;

    // In real code: use aws/aws-sdk-php with these credentials
    // $s3 = new Aws\S3\S3Client([
    //     'region'      => AWS_REGION,
    //     'credentials' => [
    //         'key'    => $aws_access_key_id,
    //         'secret' => $aws_secret_access_key,
    //     ],
    // ]);

    $filename = basename($filePath);
    echo "Uploading {$filename} to s3://" . AWS_BUCKET . "/{$filename}" . PHP_EOL;
    return true;
}

uploadBackupToS3('/var/backups/db_dump_2024.sql.gz');
