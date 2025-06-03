<?php
// 1. Запись в файл test.txt
file_put_contents('test.txt', '12345');

// 2. Копирование в copy.txt
copy('test.txt', 'copy.txt');

// 3. Определение размера test.txt
echo "Размер test.txt: " . filesize('test.txt') . " байт<br>";

// 4. Переименование old.txt в new.txt
if (file_exists('old.txt')) {
    rename('old.txt', 'new.txt');
} else {
    echo "Файл old.txt не существует<br>";
}

// 5. Сумма чисел из test.txt
$numbers = file('test.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$sum = array_sum($numbers);
echo "Сумма чисел: " . $sum . "<br>";
?>