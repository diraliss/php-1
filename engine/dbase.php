<?php
function get_by_id($img_id) {
    $sql = "SELECT * FROM " . DATABASE_NAME . " WHERE id=$img_id";
    return get($sql);
}

function get_all() {
    $sql = "SELECT * FROM " . DATABASE_NAME;
    return get($sql);
}

function save_img($name, $size) {
    $link = connect();
    $path = '/upload/' . $name;
    $path_tumb = '/upload/tumb/' . $name;
    $sql = "INSERT INTO " . DATABASE_NAME . " (img_name, path, path_tumb, img_size) VALUES ('$name', '$path', '$path_tumb', $size);";
    $result = mysqli_query($link, $sql);
    return $result;
}

function get($sql) {
    $link = connect();
    $result = mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);
    return $result;
}

function connect() {
    $link = mysqli_connect('localhost', 'root', '', 'geekshop');

    if ($link) {
        mysqli_set_charset($link, "utf8");
    }

    return $link;
}

function disconnect($link) {
    mysqli_close($link);
}