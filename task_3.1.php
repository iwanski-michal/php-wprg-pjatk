<?php
function randomArrayOfNumbers($index)
{
    $array = [];
    for ($i = 1; $i <= 100; $i++){
        $array[]= rand(1,20);
    }
//    print_r($array);
    return $array[$index];
}

$ValueFromRandomArray = randomArrayOfNumbers(10);
print_r($ValueFromRandomArray);
