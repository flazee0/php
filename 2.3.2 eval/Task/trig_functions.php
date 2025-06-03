<?php

function calculateTrig($function, $angle) 
{
    $radians = deg2rad($angle);
    
    $trigFunctions = [
        'sin'  => 'sin',
        'cos'  => 'cos', 
        'tan'  => 'tan',
        'cot'  => function($x) { 
            return 1 / tan($x); 
        }
    ];
    
    if (!isset($trigFunctions[$function])) {
        throw new Exception(
            "Неизвестная тригонометрическая функция: $function"
        );
    }
    
    return is_callable($trigFunctions[$function])
        ? $trigFunctions[$function]($radians)
        : $trigFunctions[$function]($radians);
}

?>