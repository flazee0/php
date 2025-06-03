<?php

// На карманы в самой регулярке. Строки, состоящие из одинаковых символов
$string = 'aaa bcd xxx efg';

preg_match_all('/\b([a-z])\1+\b/i', $string, $matches);

print_r($matches[0]);

// На preg_match. Домен с http
function isHttpDomain($url) {
    $pattern = '/^https?:\/\/[a-z0-9\-]+(\.[a-z]{2,})+/i';
    
    return preg_match($pattern, $url) === 1;
}

$testUrls = [
    'http://site.ru',
    'https://site.com',
    'ftp://site.com',
    'http:/site.ru',
];

foreach ($testUrls as $url) {
    echo $url . ' - ' . (isHttpDomain($url) ? 'Домен с http' : 'Не домен с http') . "\n";
}

// На обратный слеш \. Замена строки
$string = 'a\a abc';

$pattern = '/a\\\\a/';

$result = preg_replace($pattern, '!', $string);

echo $result;

// На preg_replace_callback. Квадраты чисел вместо чисел
$string = "Я родился 29 числа 11 месяца 2005 года, то есть 185 дней назад";

$result = preg_replace_callback(
    '/\d+/',
    function($matches) {
        $number = (int)$matches[0];
        return $number * $number;
    },
    $string
);

echo $result; 


// На экранировку. Нахождение конкретных строк. 
$string = '*+ *q+ *qq+ *qqq+ *qqq qqq+';

preg_match_all('/\*q*\+/', $string, $matches);

print_r($matches[0]);

?>

