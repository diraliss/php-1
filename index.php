<?php
function sum($arg1, $arg2)
{
    return ($arg1 + $arg2);
}

function sub($arg1, $arg2)
{
    return ($arg1 - $arg2);
}

function mul($arg1, $arg2)
{
    return ($arg1 * $arg2);
}

function div($arg1, $arg2)
{
    return ($arg1 / $arg2);
}

function _diff()
{
    $a = rand(-20, 20);
    $b = rand(-20, 20);

    if ($a >= 0 && $b >= 0) {
        return "$a - $b = " . sub($a, $b);
    } elseif ($a < 0 && $b < 0) {
        return "$a * $b = " . mul($a, $b);
    } else {
        return "$a + $b = " . sum($a, $b);
    }
}

function _rand()
{
    $a = rand(0, 15);
    $a_arr = [];
    switch ($a) {
        case 0:
            $a_arr[] = 0;
        case 1:
            $a_arr[] = 1;
        case 2:
            $a_arr[] = 2;
        case 3:
            $a_arr[] = 3;
        case 4:
            $a_arr[] = 4;
        case 5:
            $a_arr[] = 5;
        case 6:
            $a_arr[] = 6;
        case 7:
            $a_arr[] = 7;
        case 8:
            $a_arr[] = 8;
        case 9:
            $a_arr[] = 9;
        case 10:
            $a_arr[] = 10;
        case 11:
            $a_arr[] = 11;
        case 12:
            $a_arr[] = 12;
        case 13:
            $a_arr[] = 13;
        case 14:
            $a_arr[] = 14;
        case 15:
            $a_arr[] = 15;
    }
    return implode("<br>", $a_arr);
}

function operation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "-":
            return sub($arg1, $arg2);
            break;
        case "+":
            return sum($arg1, $arg2);
            break;
        case "*":
            return mul($arg1, $arg2);
            break;
        case "/":
            return div($arg1, $arg2);
            break;
    }
    return 0;
}

function _pow($val, $pow)
{
    if ($pow != 0) {
        return $val * _pow($val, $pow - 1);
    } elseif ($val != 0) {
        return 1;
    } else {
        return 0;
    }
}

function power($val, $pow)
{
    if ($pow < 0) {
        return 1 / _pow($val, abs($pow));
    } else {
        return _pow($val, abs($pow));
    }
}

date_default_timezone_set('Europe/Moscow');
header('content-type: text/html; charset=utf-8');

$rand_operation = ["+", "-", "*", "/"][rand(0, 3)];

$title = 'Hello world!';
$year = date('Y');
$result_diff = _diff();
$result_rand = _rand();
$result_operation = operation(rand(-20, 20), rand(-20, 20), $rand_operation);
$result_power = power(rand(-5, 5), rand(-5, 5));

$content = "
<html>
<header>
<title>$title</title>
</header>
<body>
<p>Ex 1</p>
<p>$result_diff</p>
<p>Ex 2</p>
<p>$result_rand</p>
<p>Ex 3-4</p>
<p>$result_operation</p>
<p>Ex 6</p>
<p>$result_power</p>
<footer>Ex 5: $year</footer>
</body>
</html>
";

echo $content;
?>