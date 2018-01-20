<?php
require_once '../config/main.php';
require_once ENGINE_DIR . 'render.php';

$comments = [];

$sql = "SELECT * FROM `comments`";
$res = getAssocResult($sql);
if(count($res) > 0) {
    $comments = $res;
}

render('comment', ['comments' => $comments]);




