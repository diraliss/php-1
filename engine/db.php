<?php
/**
 * Получить результат в виде ассоциативного массива
 * @param $sql
 * @param null $db
 * @return array
 */
function getAssocResult($sql, $db = null){
    if ($db == null) {
        $db = getConnection();
    }

	$result = mysqli_query($db, $sql);
	$array_result = [];

	while($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }
    mysqli_close($db);
	return $array_result;
}

/**
 * Выполнить соединение с базой
 * @return mysqli
 */
function getConnection(){
    $db = mysqli_connect(HOST, USER, PASS, DB);
    mysqli_query($db, "SET NAMES utf8");

    return $db;
}

/**
 * Выполнить запрос
 * @param $sql
 * @param null $db
 * @return bool|mysqli_result
 */
function executeQuery($sql, $db = null){
    if($db == null){
        $db = getConnection();
    }

	$result = mysqli_query($db, $sql);
    mysqli_close($db);

	return $result;
}

/**
 * Выполнить экранирование строки
 * @param $str
 * @param null $db
 * @return string
 */
function escapeString($str, $db = null) {
    if ($db == null) {
        $db = getConnection();
    }

    $res = mysqli_real_escape_string($db, $str);

    mysqli_close($db);

    return $res;
}