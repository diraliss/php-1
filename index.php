<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Images</title>
    <style>
        .div_img {
            display: inline-block;
            width: 500px;
            height: 300px;
            text-align:center;
        }

        .img {
            height: 300px;
        }
    </style>
</head>
<body>
<?php
$directory = "./images";
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');
$file_parts = array();
$ext = "";

$dir_handle = @opendir($directory) or die("Ошибка при открытии папки !!!");
while ($file = readdir($dir_handle)) {
    if ($file == "." || $file == "..") continue;
    $file_parts = explode(".", $file);
    $ext = strtolower(array_pop($file_parts));
    if (in_array($ext, $allowed_types)) {
        echo "<div class = 'div_img' ><a href='$directory/$file' target='_blank'><img src='$directory/$file' class='img' title='$file'/></a></div>";
    }
}
closedir($dir_handle);
?>
<form action="save.php" enctype="multipart/form-data" method="POST" name="form_upload">
    <input id="file" name="file" type="file" accept="image/*,image/jpeg"/>
    <input name="button" type="submit" value="Отправить"/>
</form>
</body>
</html>