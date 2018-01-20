<?php

if (!defined('PUBLIC_DIR')) {
    define('PUBLIC_DIR', realpath(__DIR__ . '/../'));
}

if (!defined('ENGINE_DIR')) {
    define('ENGINE_DIR', PUBLIC_DIR . '/engine/');
}

if (!defined('CONFIG_DIR')) {
    define('CONFIG_DIR', PUBLIC_DIR . '/config/');
}

if (!defined('UPLOAD_DIR')) {
    define('UPLOAD_DIR', PUBLIC_DIR . '/upload/');
}

if (!defined('TUMB_DIR')) {
    define('TUMB_DIR', PUBLIC_DIR . '/upload/tumb');
}

if (!defined('DATABASE_NAME')) {
    define('DATABASE_NAME', '`images`');
}
