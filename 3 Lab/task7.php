<?php
function printStringReturnNumber(): int
{
    echo "String\n";
    return 99;
}

$my_num = printStringReturnNumber();
echo $my_num;
