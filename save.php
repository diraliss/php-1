<?php
$error = null;
$info = null;
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($file_extension), array('jpg', 'jpeg', 'png', 'gif'))) {
        if ($_FILES['file']['size'] < 2048000) {
            $file_name = time() . $_FILES['file']['name'];
            $destination = 'images/' . $file_name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $destination))
                $info = 'Файл успешно загружен';
            else
                $error = 'Не удалось загрузить файл';
        } else
            $error = 'Файл слишком велик!';
    } else
        $error = 'У файла недопустимое расширение';
    echo $error;
    header('Location: index.php');
}
?>