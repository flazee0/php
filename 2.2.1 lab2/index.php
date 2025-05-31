<?php
// 1. array_keys, array_values, array_combine
$keys = ['a', 'b', 'c'];
$values = [1, 2, 3];
$combined = array_combine($keys, $values);
echo "1. Объединенный массив:\n";
print_r($combined);
echo "\n";

// 2. array_shift, array_pop, array_unshift, array_push
$numbers = [1, 2, 3, 4, 5];
$first = array_shift($numbers);
$last = array_pop($numbers);
echo "2. Первый элемент: $first, Последний элемент: $last\n";
echo "Оставшийся массив:\n";
print_r($numbers);
echo "\n";

// 3. count
$arr = ['a', 'b', 'c', 'd', 'e'];
$count = count($arr);
echo "3. Количество элементов в массиве: $count\n\n";

// 4. Ассоциативный массив дней недели
$weekDays = [
    1 => 'Понедельник',
    2 => 'Вторник',
    3 => 'Среда',
    4 => 'Четверг',
    5 => 'Пятница',
    6 => 'Суббота',
    7 => 'Воскресенье'
];
$currentDay = date('N'); 
echo "4. Текущий день недели: " . $weekDays[$currentDay] . "\n\n";

// 5. Двумерный массив для разных языков
$days = [
    'ru' => [1 => 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
    'en' => [1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
];

$lang = 'ru'; 
$day = 3;
echo "5. День недели ($lang, день $day): " . $days[$lang][$day] . "\n";
?>