<?php
require_once 'Task/trig_functions.php';

function calculateExpression($expression) 
{
    if (preg_match('/(\d+)\/(\d+)\s*\*\s*sin\((\d+)\)/', $expression, $matches)) 
    {
        $numerator   = $matches[1];
        $denominator = $matches[2];
        $angle       = $matches[3];
        
        $sinValue = calculateTrig('sin', $angle);
        
        return ($numerator / $denominator) * $sinValue;
    }
    else 
    {
        throw new Exception(
            "Неверный формат выражения. Ожидается формат: 4/3*sin(30)"
        );
    }
}

$expression = trim(file_get_contents('Task/expression.txt'));
$result     = '';
$error      = '';

try 
{
    $result = calculateExpression($expression);
} 
catch (Exception $e) 
{
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cont">
        <h1>Тригонометрический калькулятор</h1>
        
        <div class="calc">
            <div class="expression">
                <h2>Выражение:</h2>
                <p><?php echo htmlspecialchars($expression); ?></p>
            </div>
            
            <div id="result">
                <?php if ($error): ?>
                    <p class="error">Ошибка: <?php echo htmlspecialchars($error); ?></p>
                <?php else: ?>
                    <p>Результат: <?php echo number_format($result, 4); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>