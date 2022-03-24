<?php
$array = []; //losowa tablica
for ($i = 1; $i <= 10; $i++){
    $array[]= rand(1,20);
}
print_r($array);
echo "<br/>";

function findGreatestWithForLoop($array){

$greatest = 0;
for ($i = 0; $i< count($array); $i++){
    if ($greatest < $array[$i]){
        $greatest = $array[$i];
    }
}
return $greatest;
}
function findGreatestWithWhileLoop($array){
    $i = 0;
    $greatest = 0;
    while ($i<count($array)){
        if ($greatest < $array[$i]){
            $greatest = $array[$i];
        }
        $i++;
    }
    return $greatest;
}
function findGreatestWithDoWhileLoop($array){
    $i = 0;
    $greatest = 0;
    do{
        if ($greatest < $array[$i]){
            $greatest = $array[$i];
        }
        $i++;
    }while($i<count($array));
    return $greatest;
}
function findGreatestWithForEachLoop($array){
    $i = 0;
    $greatest = 0;
    foreach($array as $el){
        if ($greatest < $el){
            $greatest = $el;
        }
    }
    return $greatest;
}

echo "FOR: ".findGreatestWithForLoop($array) ."<br/>";
echo "WHILE: ".findGreatestWithWhileLoop($array) ."<br/>";
echo "DO WHILE: ".findGreatestWithDoWhileLoop($array) ."<br/>";
echo "FOREACH: ".findGreatestWithForEachLoop($array) ."<br/>";






