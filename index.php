<?php
date_default_timezone_set('Europe/Moscow');
header('content-type: text/html; charset=utf-8');

$h1 = 'Привет, мир!';
$title = 'Hello world!';
$year = date('Y');

$content = "
<html>
<header>
<title>$title</title>
</header>
<body>
<h1>$h1</h1>
<p>$year</p>
</body>
</html>
";

echo $content;

echo "<hr>";

$a = 5;
$b = '05';

echo "<p>\$a == \$b => ";
var_dump($a == $b);
echo "</p><p>Так как используется не тождественное сравнение. При таком сравнении числа со строкой, строка будет преобразована в число</p>";

echo "<p>(int)'012345' => ";
var_dump((int)'012345');
echo "</p><p>Так как (int) преобразует тип строки в число</p>";

echo "<p>(float)123.0 === (int)123.0) => ";
var_dump((float)123.0 === (int)123.0);
echo "</p><p>Так как используется тождественное сравнение и по значению, и по типу</p>";

echo "<p>(int)0 === (int)'hello, world') => ";
var_dump((int)0 === (int)'hello, world');
echo "</p><p>После преобразования 'hello, world' в число оно будет равно 0, так как строка чисел в себе не содержит</p>";

echo "<hr>";

echo "<p>\$a = $a; \$b = $b; <br>";
list($b, $a) = array($a, $b);
echo "<p>\$a = $a; \$b = $b;";
?>