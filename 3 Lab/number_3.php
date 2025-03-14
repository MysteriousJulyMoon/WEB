<?php
$num_Languages = 4;     // Ruby, Python, JavaScript, C++
$month = 11;    // месяцев, потраченных на обучение

$days = $month * 16; // дней в месяц

$days_Per_Language = $days / $num_Languages;
echo 'Вывод: ', $days_Per_Language, "\n";
