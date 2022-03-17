<?php
$a = 5;
$b = 3;
$c = 6;
$temp = 0;
if ($a > $c){
    $temp = $a;
    $a = $c;
    $c = $temp;
}
if ($a > $b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}
if ($b > $c){
    $temp = $b;
    $b = $c;
    $c = $temp;
}

if ($a$a+$b$b==$c*$c){
    echo "Jest to pitagoras";
}else{
    echo "Nie jest to pitagoras";
}
echo "$a $b $c";