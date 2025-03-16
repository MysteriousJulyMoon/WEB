<?php
echo "Работа с %\n";
$a = 10;
$b = 3;
echo $a % $b, "\n";

echo "Переменная a: ";
$a = fgets(STDIN);
echo "Переменная b: ";
$b = fgets(STDIN);
if ($a % $b == 0) {
    echo "Делится, результат: ", $a / $b, "\n";
} else {
    echo "Делится с остатком, результат: ", $a % $b, "\n";
}

echo "\nРабота со степенью и корнем\n";
$st = pow(2, 10);
$sr = sqrt(245);

$array = array(4, 2, 5, 19, 13, 0, 10);
$sumSqr = 0;
foreach ($array as $value) {
    $sumSqr += $value**2;
}

echo "1. 2^10 = ", $st,
"\n2. 245^(1/2) = ", $sr,
"\n3. Корень из суммы квадратов элементов массива: ", sqrt($sumSqr), "\n";


echo "\nРабота с функциями округления\n";
$num1 = sqrt(379);
$sqrt0 = round($num1);
$sqrt1 = round($num1, 1);
$sqrt2 = round($num1, 2);

$num2 = sqrt(587);
$array = ['floor' => floor($num2), 'ceil' => ceil($num2)];

echo "Результаты округления из числа 379:",
"\n$sqrt0", "\n$sqrt1", "\n$sqrt2";
echo "\nРезультат округления из числа 587: ";
var_dump($array);


echo "\nИспользование min и max\n";
$array = [4, -2, 5, 19, -130, 0, 10];
echo "Минимальное значение в массиве: ", min($array),
"\nМаксимальное значение в массиве: ", max($array), "\n";


echo "\nИспользование случайной генерации\n";
echo rand(1, 100), "\n";

$array = [];
for ($i = 0; $i < 10; $i++) {
    $array[$i] = rand(1, 100);
}
var_dump($array);

echo "\nИспользование модуля\n";
$a = 68;
$b = 104;
echo '|a - b| = ', abs($a - $b);
echo "\n|b - a| = ", abs($b - $a), "\n";

$array = [1, 2, -1, -2, 3, -3];
$newArray = array_map('abs', $array);
var_dump($newArray);


echo "Введите число: ";
$a = fgets(STDIN);

$arrayDivisor = [];
for ($d = 1; $d <= $a/2; $d++) {
    if ($a % $d == 0) {
        $arrayDivisor[] = $d;
    }
}

$arrayDivisor[] = intval($a);
echo "Делители числа {$a}:\n";
var_dump($arrayDivisor);

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sum = 0;
$count = 0;
foreach ($array as $value) {
    if ($sum <= 10) {
        $sum += $value;
        $count++;
    }
}
echo "Для того, чтобы сумма получилась > 10, необходимо сложить первые {$count} чисел.";

