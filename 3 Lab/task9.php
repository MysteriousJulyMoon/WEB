<?php
$array = [];
for ($i = 1; $i <= 10; $i++) {
    $array[] = str_repeat('x', $i);
}
print_r($array);

function arrayFill($value, $count): array
{
    $array = [];
    for ($i = 0; $i < $count; $i++) {
        $array[] = $value;
    }
    return $array;
}
print_r(arrayFill('x', 5));

$numbers = [[1, 2, 3], [4, 5], [6]];
$sum = array_sum(array_merge(...$numbers));
echo "Сумма элементов массива: $sum\n";

// [[1, 2, 3], [4, 5, 6], [7, 8, 9]]
$array = [];
for ($i = 0; $i < 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        $array[$i][] = $i * 3 + $j;
    }
}
print_r($array);

$array = [2, 5, 3, 9];
$result = $array[0] * $array[1] + $array[2] * $array[3];
echo "Результат: $result\n";

// ФИО
$user = ['name' => 'Юлия', 'surname' => 'Дружкина', 'patronymic' => 'Витальевна'];
echo $user['surname'] . ' ' . $user['name'] . ' ' . $user['patronymic'] . "\n";

// Текущая дата
$date = ['year' => date('Y'), 'month' => date('m'), 'day' => date('d')];
echo $date['year'] . '/' . $date['month'] . '/' . $date['day'] . "\n";

$arr = ['a', 'b', 'c', 'd', 'e'];
echo count($arr) . "\n";

echo end($arr) . "\n";

echo prev($arr) . "\n";
