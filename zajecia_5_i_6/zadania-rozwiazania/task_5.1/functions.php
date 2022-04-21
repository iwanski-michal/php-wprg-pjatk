<?php

function add($a, $b){
    $sum = $a+$b;
    echo "Wynik: $sum <br />";
}

function substract($a, $b){
    $sum = $a-$b;
    echo "Wynik: $sum <br />";
}

function multiply($a, $b){
    $sum = $a*$b;
    echo "Wynik: $sum <br />";
}

function divide($a, $b){
    if ($b == 0) {
        echo "Nie można dzielić przez 0!";
    } else {
        $sum = $a / $b;
        echo "Wynik: $sum <br />";
    }
}
?>