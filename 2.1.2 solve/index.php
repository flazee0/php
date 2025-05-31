<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Решение уравнения</title>
</head>
<body>
  <?php
  // Вариант 0
    $equation = "X * 9 = 56";
    

    $parts = explode(" ", $equation);
    

    if (count($parts) !== 5 || $parts[3] !== "=") {
      die("Уравнение имеет неверный формат. Используйте формат: 'X [оператор] [число] = [число]'");
    }
    

    $left = $parts[0];
    $operator = $parts[1];
    $right = $parts[2];
    $result = $parts[4];
    

    if (strtoupper($left) === 'X') {
      switch ($operator) {
        case '+':
          $answer = $result - $right;
          break;
        case '-':
          $answer = $result + $right;
          break;
        case '*':
          $answer = $result / $right;
          break;
        case '/':
          $answer = $result * $right;
          break;
        default:
          $answer = 'Неизвестный оператор';
      }
    } elseif (strtoupper($right) === 'X') {
      switch ($operator) {
        case '+':
          $answer = $result - $left;
          break;
        case '-':
          $answer = $left - $result;
          break;
        case '*':
          $answer = $result / $left;
          break;
        case '/':
          $answer = $left / $result;
          break;
        default:
          $answer = 'Неизвестный оператор';
      }
    } else {
      $answer = 'X не найден в уравнении';
    }
    
    echo "<h2>Решение уравнения: $equation</h2>";
    echo "<p>Позиция X: " . (strtoupper($left) === 'X' ? 'слева' : 'справа') . "</p>";
    echo "<p>Оператор: $operator</p>";
    echo "<p>Ответ: X = $answer</p>";
  ?>
</body>
</html>