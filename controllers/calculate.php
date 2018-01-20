<?php
require_once '../config/main.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'render.php';
$result = "";

if (isset($_POST['lit1']) && isset($_POST['lit2']) && isset($_POST['lit3'])) {
    $lit1 = (double)$_POST['lit1'];
    $lit2 = (double)$_POST['lit2'];
    $lit3 = $_POST['lit3'];
    $result = 'Результат: ' . $lit1 . $lit3 . $lit2 . '=';
    switch ($lit3) {
        case '+':
            $result .= $lit1 + $lit2;
            break;
        case '-':
            $result .= $lit1 - $lit2;
            break;
        case '*':
            $result .= $lit1 * $lit2;
            break;
        case '/':
            if ($lit2 == 0) $result="Деление на ноль!"; else  $result .= $lit1 / $lit2;
            break;
    }
}

render('calculate', ['result' => $result]);