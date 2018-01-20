<?php

if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', realpath(__DIR__ . '/../'));
}

if (!defined('PUBLIC_DIR')) {
    define('PUBLIC_DIR', ROOT_DIR . '/htdocs/');
}

if (!defined('ENGINE_DIR')) {
    define('ENGINE_DIR', ROOT_DIR . '/engine/');
}

if (!defined('CONTROL_DIR')) {
    define('CONTROL_DIR', ROOT_DIR . '/controllers/');
}

if (!defined('CONFIG_DIR')) {
    define('CONFIG_DIR', ROOT_DIR . '/config/');
}

if (!defined('UPLOAD_DIR')) {
    define('UPLOAD_DIR', PUBLIC_DIR . '/upload/');
}

if (!defined('TUMB_DIR')) {
    define('TUMB_DIR', PUBLIC_DIR . '/upload/tumb/');
}

if (!defined('TEMPLATES_DIR')) {
    define('TEMPLATES_DIR', ROOT_DIR . '/templates/');
}

// DB connection param
define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS', 'pass');
define('DB', 'geekshop');

