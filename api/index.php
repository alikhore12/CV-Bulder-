<?php

// Ensure HTTPS scheme is recognized behind Vercel edge reverse proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

// Forward Vercel requests to normal Laravel index.php
// Prepare writable /tmp directories for Vercel serverless execution
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Copy sqlite database to /tmp if not already there and DB is SQLite
if (! file_exists('/tmp/database.sqlite')) {
    if (file_exists(__DIR__.'/../database/database.sqlite')) {
        @copy(__DIR__.'/../database/database.sqlite', '/tmp/database.sqlite');
    } else {
        @touch('/tmp/database.sqlite');
    }
}

require __DIR__.'/../public/index.php';
