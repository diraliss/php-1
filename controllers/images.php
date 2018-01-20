<?php
require_once '../config/main.php';
require_once ENGINE_DIR . 'resize.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'image_helper.php';

$images = getAllImages();

render('images', ['images' => $images]);