<?php
// 1. Арифметические операции (нахождение углов)
$a = 27;
$b = 12;
$angle1 = $a + $b;  
$angle2 = $a * $b;    
$angle3 = $a ** 2;       
$angle4 = $b ** 2;      
$angle5 = $a % $b;       
echo "1. Значения углов в градусах:<br>";
echo "Угол 1: ".$angle1."°<br>";
echo "Угол 2: ".$angle2."°<br>";
echo "Угол 3: ".$angle3."°<br>";
echo "Угол 4: ".$angle4."°<br>";
echo "Угол 5: ".$angle5."°<br><br>";

// 2. Конкатенация
$quieter = 'Тише';
$go = 'едешь';
$further = 'дальше';
$proverb = $quieter . ' ' . $go . ', ' . $further . ' будешь.';

echo "2. Пословица:<br>";
echo $proverb . "<br><br>";

// 3. Операторы присваивания
$a = 14;
$b = 21;
$c = 'ласточек';
$a += $b; 
$result = $a . ' ' . $c;

echo "3. Результат:<br>";
echo $result . "<br><br>";

// 4. Приведение типов
$a = 2; 
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

echo "4. Приведение типов к bool:<br>";
echo "<table border='1'>";
echo "<tr><th>Исходный тип</th><th>Полученное значение</th></tr>";
echo "<tr><td>".gettype($a)."</td><td>".(int)(bool)$a."</td></tr>";
echo "<tr><td>".gettype($b)."</td><td>".(int)(bool)$b."</td></tr>";
echo "<tr><td>".gettype($c)."</td><td>".(int)(bool)$c."</td></tr>";
echo "<tr><td>".gettype($d)."</td><td>".(int)(bool)$d."</td></tr>";
echo "<tr><td>".gettype($g)."</td><td>".(int)(bool)$g."</td></tr>";
echo "<tr><td>".gettype($f)."</td><td>".(int)(bool)$f."</td></tr>";
echo "</table><br>";

// 5. Форматирование переменных
$year = 2022;
$month = 3;
$day = 2;
$date = sprintf("Дата: %04d-%02d-%02d", $year, $month, $day);

echo "5. Форматированная дата:<br>";
echo $date . "<br>";
?>