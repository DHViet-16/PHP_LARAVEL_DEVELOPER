<?php
function divide(float $a, float $b): float
{
    if ($b === 0.0) {
        throw new Exception("Cannot divide by zero");
    }
    return $a / $b;
}

try {
    echo divide(10, 0);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} finally {
    echo "Operation finished";
}
