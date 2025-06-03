<?php
function calculateExpr($expr) {
    $expr = str_replace(' ', '', $expr);
    
    if (!preg_match('/^[\d\+\-\*\/\(\)\.]+$/', $expr)) {
        return "Error: invalid chars";
    }

    $balance = 0;
    foreach (str_split($expr) as $char) {
        if ($char === '(') $balance++;
        if ($char === ')') $balance--;
        if ($balance < 0) return "Bracket error";
    }
    if ($balance !== 0) return "Bracket error";

    try {
        return evaluateExpression($expr);
    } catch (Exception $e) {
        return "Calculation error";
    }
}

function evaluateExpression($expr) {
    $expr = str_replace(' ', '', $expr);
    
    while (($start = strrpos($expr, '(')) !== false) {
        $end = strpos($expr, ')', $start);
        if ($end === false) throw new Exception("Unbalanced brackets");
        
        $inner = substr($expr, $start + 1, $end - $start - 1);
        $result = evaluateExpression($inner);
        $expr = substr_replace($expr, $result, $start, $end - $start + 1);
    }
    
    return calculateBasic($expr);
}

function calculateBasic($expr) {
    while (preg_match('/(\d+\.?\d*)([\/\*])(\d+\.?\d*)/', $expr, $matches)) {
        $left = (float)$matches[1];
        $op = $matches[2];
        $right = (float)$matches[3];
        
        if ($op === '*') {
            $result = $left * $right;
        } elseif ($op === '/' && $right != 0) {
            $result = $left / $right;
        } else {
            return "Error";
        }
        
        $expr = preg_replace('/\d+\.?\d*[\/\*]\d+\.?\d*/', (string)$result, $expr, 1);
    }
    
    while (preg_match('/(^|-?\d+\.?\d*)([+-])(\d+\.?\d*)/', $expr, $matches)) {
        $left = (float)$matches[1];
        $op = $matches[2];
        $right = (float)$matches[3];
        
        if ($op === '+') {
            $result = $left + $right;
        } else {
            $result = $left - $right;
        }
        
        $expr = preg_replace('/-?\d+\.?\d*[+-]\d+\.?\d*/', (string)$result, $expr, 1);
    }
    
    $finalResult = (float)$expr;
    $finalResultStr = (string)$finalResult;

    if (stripos($finalResultStr, 'e') !== false) {
        return "Error: too large";
    }

    return $finalResult;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expr = $_POST['expression'] ?? '';
    $result = calculateExpr($expr);
    header("Location: ?result=" . urlencode($result));
    exit;
}

$result = isset($_GET['result']) ? htmlspecialchars($_GET['result']) : '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Minimal Calculator</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="calculator">
    <input type="text" id="display" value="<?php echo $result; ?>" readonly>
    <div class="buttons">
      <button onclick="append('7')">7</button>
      <button onclick="append('8')">8</button>
      <button onclick="append('9')">9</button>
      <button onclick="append('/')">/</button>
      
      <button onclick="append('4')">4</button>
      <button onclick="append('5')">5</button>
      <button onclick="append('6')">6</button>
      <button onclick="append('*')">×</button>
      
      <button onclick="append('1')">1</button>
      <button onclick="append('2')">2</button>
      <button onclick="append('3')">3</button>
      <button onclick="append('-')">-</button>
      
      <button onclick="append('(')">(</button>
      <button onclick="append('0')">0</button>
      <button onclick="append(')')">)</button>
      <button onclick="append('+')">+</button>
      
      <button onclick="backspace()">⌫</button>
      <button onclick="clearDisplay()">C</button>
      <button onclick="calculate()">=</button>
    </div>
    <form id="calcForm" method="post" action="">
      <input type="hidden" id="exprPost" name="expression">
    </form>
  </div>
  <script src="main.js"></script>
</body>
</html>