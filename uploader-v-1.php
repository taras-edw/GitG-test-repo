<?php
// Google Cloud Storage uploader
// WARNING: hardcoded credentials for GitGuardian testing only

$gcpServiceAccount = [
    "type"                        => "service_account",
    "project_id"                  => "myapp-production-391004",
    "private_key_id"              => "a1b2c3d4e1234567c3d4e5f6a1b2c3d4e5f6a1b2",
    "private_key"                 => "-----BEGIN RSA PRIVATE KEY-----\nMIIEowIBAAKCAQEA2a2rwplBQLF29amygykEMmYz0+Kcj3bKBp29Ba4HFBGMaOLf\nOOB14FNjc5XNKQ9mGGjTQkElHFXMFhyaqbSZPBIELHDXxHHSxNQ2m4RhFAhgUcpW\nOX7r7OXjXn7qGHQPb2dqjBs2fzNqRdADkJF8EXAMPLE+KEY+DO+NOT+USE==\n-----END RSA PRIVATE KEY-----\n",
    "client_email"                => "myapp-sa@myapp-production-391004-random-fake-org.iam.gserviceaccount.com",
    "client_id"                   => "112233445566778899001",
    "auth_uri"                    => "https://accounts.google.com/o/oauth2/auth",
    "token_uri"                   => "https://oauth2.googleapis.com/token",
];

function uploadToGcs(string $localFile, string $bucket, string $destination): bool {
    global $gcpServiceAccount;
    // In real code: use google/cloud-storage SDK with the credentials above
    echo "Uploading {$localFile} to gs://{$bucket}/{$destination}" . PHP_EOL;
    return true;
}

uploadToGcs('/tmp/export.csv', 'myapp-backups', 'exports/export.csv');
