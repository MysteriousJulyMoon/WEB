<?php
function isSumGreaterThanTen($num1, $num2): int|float
{
    return ($num1 + $num2) > 10;
}
echo isSumGreaterThanTen(4, 7);

function areNumbersEqual($num1, $num2)
{
    return $num1 === $num2;
}
echo areNumbersEqual(4, 4), "\n";

$test = 0;
echo ($test == 0) ? 'Верно' : '', "\n";

$age = 35;
if ($age < 10 || $age > 99) {
    echo "Число меньше 10 или больше 99\n";
} else {
    $sum = array_sum(str_split((string)$age));
    if ($sum <= 9) {
        echo "Сумма цифр однозначна\n";
    } else {
        echo "Сумма цифр двузначна\n";
    }
}

$arr = [1, 2, 3];
if (count($arr) == 3) {
    echo "Сумма элементов массива: " . array_sum($arr) . "\n";
}
