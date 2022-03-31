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
if (isset($_GET['number1']) && is_numeric($_GET['number1']) &&
    isset($_GET['number2']) && is_numeric($_GET['number2']) &&
    isset($_GET['operation'])) {

    $firstNumber = $_GET['number1'];
    $secondNumber = $_GET['number2'];
    switch ($_GET['operation']) {
        case 'add':
            echo add($firstNumber, $secondNumber);
            break;
        case 'substract':
            echo substract($firstNumber, $secondNumber);
            break;
        case 'divide':
            echo divide($firstNumber, $secondNumber);
            break;
        case 'multiply':
            echo multiply($firstNumber, $secondNumber);
            break;
        default:
            echo "Błędna operacja, spróbuj jeszcze raz";
            break;
    }
} else {
    echo "Brak wpisanych liczb, lub błąd przesłania danych :( Spróbuj jeszcze raz <br />";
}

echo "<a href=\"index.html\"><button type=\"button\" >Powrót</button></a>";