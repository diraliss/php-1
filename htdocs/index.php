<?php
require_once '../config/main.php';
require_once ENGINE_DIR . '/resize.php';
require_once ENGINE_DIR . '/image_helper.php';
require_once ENGINE_DIR . '/dbase.php';
$content = "";
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['up_file'])) {
    $uFile = uploadImage('up_file', UPLOAD_DIR, 5 * 1024 * 1024);

    if (empty($uFile['error'])) {
        $result = create_thumbnail(
            UPLOAD_DIR . '/' . $uFile['file'],
            TUMB_DIR . '/' . $uFile['file'],
            400,
            300
        );
        $save_result = save_img($uFile['file'], $_FILES['up_file']['size']);
        if ($result && $save_result) {
            $success = '<p>Файл загружен</p>';
        }
    } else {
        $success = '<p>' . $uFile['error'] . '</p>';
    }
}

if (!empty($_GET['img_id'])) {
    $img = get_by_id((int)$_GET["img_id"]);
    $img = $img[0];
    $src = $img["path"];
    $content .= "<img src='$src'>";
} else {
    $imgs = get_all();
    $content .= $success;
    $content .= "<form action=\"\" enctype=\"multipart/form-data\" method=\"post\">
    <input type=\"file\" name=\"up_file\">
    <input type=\"submit\" value=\"Отправить!\"></form><br/><br/>";

    foreach ($imgs as $img) {
        $id = $img["id"];
        $src = $img["path_tumb"];
        $content .= "<a href='/?img_id=$id' target=_blank><img src='$src'></a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Галерея изображений</title>
</head>
<body>
<?= $content ?>
</body>
</html>




