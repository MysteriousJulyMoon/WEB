<?php
$str = "naan naaan nan nbbbn npppn   n ncccn npn";
$regexp = "/(?=(n...n))/";                      //'n' + три любых символа + 'n'
$matches = [];

$count = preg_match_all($regexp, $str, $matches);
$matches = $matches[1];

echo "Найдено строк: $count \n";
var_dump($matches);                                   