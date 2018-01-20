<?php
require_once '../config/main.php';
require_once ENGINE_DIR . 'resize.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'image_helper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['up_file'])) {

        $uFile = uploadImage('up_file', UPLOAD_DIR, 5 * 1024 * 1024);

        if (empty($uFile['error'])) {
            $result = create_thumbnail(
                UPLOAD_DIR . '/' . $uFile['file'],
                TUMB_DIR . '/' . $uFile['file'],
                400,
                300
            );

            if ($result) {
                $success = '<p>Файл загружен</p>';
            }
        } else {
            $success = '<p>' . $uFile['error'] . '</p>';
        }
    } elseif (isset($_POST['comment']) && !empty(trim($_POST['comment']))) {

        $comment = escapeString(trim($_POST['comment']));
        $comment = htmlspecialchars($comment);

        $sql = "INSERT INTO `comments` (`text`) VALUES ('{$comment}');";
        executeQuery($sql);
    }
}

header("Location: /");