<?php
header("content-type: text/html; charset=utf-8");

$dictionary = [
    "Адыгея Республика" => [
        "Адыгейск",
        "Майкоп",
    ],
    "Бурятия Республика" => [
        "Бабушкин",
        "Гусиноозерск",
        "Закаменск",
        "Кяхта",
        "Северобайкальск",
        "Улан-Удэ",
    ],
    "Алтай Республика" => [
        "Горно-Алтайск",
    ],
    "Ингушетия Республика" => [
        "Карабулак",
        "Магас",
        "Малгобек",
        "Назрань",
    ],
    "Архангельская Область" => [
        "Архангельск",
        "Вельск",
        "Каргополь",
        "Коряжма",
        "Котлас",
        "Мезень",
        "Мирный",
        "Новодвинск",
        "Няндома",
        "Онега",
    ],
];

$menu = [
    [
        "title" => "Example 1",
        "url" => "",
        "childes" => [
            [
                "title" => "Example 1.1",
                "url" => "",
                "childes" => []
            ],
            [
                "title" => "Example 1.2",
                "url" => "",
                "childes" => [
                    [
                        "title" => "Example 1.2.1",
                        "url" => "",
                        "childes" => []
                    ],
                    [
                        "title" => "Example 1.2.2",
                        "url" => "",
                        "childes" => []
                    ],
                ]
            ],
            [
                "title" => "Example 1.3",
                "url" => "",
                "childes" => []
            ],
        ]
    ],
    [
        "title" => "Example 2",
        "url" => "",
        "childes" => [
            [
                "title" => "Example 2.1",
                "url" => "",
                "childes" => []
            ],
            [
                "title" => "Example 2.2",
                "url" => "",
                "childes" => []
            ],
        ]
    ],
    [
        "title" => "Example 3",
        "url" => "",
        "childes" => []
    ],
    [
        "title" => "Example 4",
        "url" => "",
        "childes" => []
    ],
];

function ex1()
{
    $conter = 0;
    $result = [];
    while ($conter <= 100) {
        if ($conter % 3 == 0) $result[] = $conter;
        $conter++;
    }
    return implode(", ", $result);
}

function ex2()
{
    $conter = 0;
    $result = [];
    do {
        if ($conter == 0) {
            $result[] = "$conter – это ноль.";
        } elseif ($conter % 2 == 0) {
            $result[] = "$conter – четное число.";
        } else {
            $result[] = "$conter – нечетное число.";
        }
        $conter++;
    } while ($conter <= 10);
    return implode("<br>", $result);
}

function ex3($first = "")
{
    global $dictionary;
    $result = [];
    foreach ($dictionary as $region => $cityArr) {
        if ($first !== "") {
            $newCityArr = [];
            foreach ($cityArr as $city) {
                if (preg_split("//u", $city)[1] == $first) $newCityArr[] = $city;
            }
            $cityArr = $newCityArr;
        }
        $result[] = "$region:<br>" . implode(", ", $cityArr);
    }
    return implode("<br>", $result);
}

function transliterate($string)
{
    $russian = array("А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ы", "Ь", "Э", "Ю", "Я", "а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я", " ");
    $english = array("A", "B", "V", "G", "D", "E", "E", "Gh", "Z", "I", "Y", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "H", "C", "Ch", "Sh", "Sch", "Y", "Y", "Y", "E", "Yu", "Ya", "a", "b", "v", "g", "d", "e", "e", "gh", "z", "i", "y", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "h", "c", "ch", "sh", "sch", "\"", "y", "'", "e", "yu", "ya", "_");

    return str_replace($russian, $english, $string);
}

function menu($menu)
{
    $result = "<ul>";
    foreach ($menu as $elem) {
        $title = $elem["title"];
        $url = $elem["url"];
        $result .= "<li><a href='$url'>$title</a>";
        if (count($elem["childes"]) > 0) {
            $result .= menu($elem["childes"]);
        }
        $result .= "</li>";
    }
    $result .= "</ul>";
    return $result;
}

function ex7()
{
    $result = "";
    for ($i = 0; $i <= 9; $result .= $i++ . "; ") ;
    return $result;
}


$ex1 = ex1();
$ex2 = ex2();
$ex3 = ex3();
$transliterate = transliterate("Меня зовут Губанова Мария Михайловна. Рада приветствовать!");
$ex6 = menu($menu);
$ex7 = ex7();
$ex8 = ex3("К");

$content = "
<html>
<header></header>
<body>
<p>Ex 1</p>
<p>$ex1</p>
<p>Ex 2</p>
<p>$ex2</p>
<p>Ex 3</p>
<p>$ex3</p>
<p>Ex 4, 5, 9</p>
<p>$transliterate</p>
<p>Ex 6</p>
<p>$ex6</p>
<p>Ex 7</p>
<p>$ex7</p>
<p>Ex 8</p>
<p>$ex8</p>
</body>
</html>
";

echo $content;
?>