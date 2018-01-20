<?php
require_once '../config/main.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'image_helper.php';

$imgId = -1;

if (isset($_GET['image']) && !empty($_GET['image']) && is_numeric($_GET['image'])) {
    $imgId = $_GET['image'];
}

if ($imgId === -1) {
    header("Location: index.php");
}

$imgInfo = getImageInfo($imgId);

if (empty($imgInfo)) {
    header("Location: /");
}

incCounter($imgInfo['id']);

?>

<img src="upload/<?=$imgInfo['name']?>">
<p><?=$imgInfo['views']?></p>




