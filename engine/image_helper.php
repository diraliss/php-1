<?php

/**
 * Загрузка изображения в указанную папку
 * @param $files
 * @param $dir
 * @param $maxSize
 * @return array
 */
function uploadImage($files, $dir, $maxSize) {

    static $count = 0;
    $count++;
    if (!preg_match('/\/$/', $dir)) $dir .= '/';

    $imageTypes = array
    (
        'image/gif' => 'gif',
        'image/jpeg' => 'jpeg',
        'image/png' => 'png',
    );

    $out = array(
        'error' => '',
        'file' => ''
    );

    if (!isset($_FILES[$files])) {
        $out['error'] = 'Файл не загружен';
        return $out;
    }

    $fileTmpName = $_FILES[$files]['tmp_name'];
    $fileType = $_FILES[$files]['type'];


    if (!is_uploaded_file($fileTmpName)) {
        $out['error'] = 'Ошибка загрузки файла ';
        return $out;
    }

    if (filesize($fileTmpName) > $maxSize) {
        $out['error'] = 'Превышен максимальный размер файла';
        return $out;
    }

    if (!isset($imageTypes[$fileType])) {

        $out['error'] = 'Файл не является картинкой';
        return $out;
    }


    $out['file'] = md5(time() . $count . rand(0, 1000)) . '.' . $imageTypes[$fileType];

    if (!move_uploaded_file($fileTmpName, $dir . $out['file'])) {
        $out['error'] = 'Ошибка загрузки файла ';
        return $out;
    }

    if (empty($out['error'])) {
        addImageToDb($out['file'], $_FILES[$files]['name'], filesize($fileTmpName));
    }

    return $out;

}

/**
 * Получить информацию об изображении
 * @param $imgId
 * @return array
 */
function getImageInfo($imgId) {
    $link = getConnection();

    $sql = "SELECT * FROM `images` WHERE `id` = " . (int) $imgId;

    $result = getAssocResult($sql, $link);

    if (count($result) > 0) {
        return $result[0];
    }

    return [];
}

/**
 * Увеличить счетчик
 * @param $imgId
 */
function incCounter($imgId) {

//    $res = getAssocResult("SELECT `views` FROM `images` WHERE `id` = " . (int) $imgId);
//    $curCounter = $res['views'];
//    $curCounter++; //5000 -> 5001
    //--------------------------------------
    //$sql = "UPDATE `images` SET `views` = {$curCounter} WHERE `id` = " . (int) $imgId;

    $sql = "UPDATE `images` SET `views` = `views` + 1 WHERE `id` = " . (int) $imgId;

    executeQuery($sql);

}

/**
 * Добавить изображение в базу
 * @param $filePath
 * @param $fileName
 * @param $fileSize
 */
function addImageToDb($filePath, $fileName, $fileSize) {
    $filePath = escapeString($filePath);
    $fileName = escapeString($fileName);
    $fileSize = (int) $fileSize;

    $sql = "INSERT INTO `images` (`name`, `title`, `size`, `views`, `date`) 
        VALUES ('{$filePath}', '{$fileName}', {$fileSize}, 0, NOW())";

    executeQuery($sql);
}

/**
 * Получить все изображения
 * @return array
 */
function getAllImages() {
    $sql = "SELECT * FROM `images` ORDER BY `views` DESC ";

    return getAssocResult($sql);
}