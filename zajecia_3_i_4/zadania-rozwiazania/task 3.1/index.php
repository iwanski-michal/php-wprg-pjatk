<?php

function add($a, $b){
    $sum = $a+$b;
    echo "Wynik: $sum \r\n <br />";
}

function substract($a, $b){
    $sum = $a-$b;
    echo "Wynik: $sum \r\n <br />";
}

function multiply($a, $b){
    $sum = $a*$b;
    echo "Wynik: $sum \r\n <br />";
}

function divide($a, $b){
    if ($b == 0) {
        echo "Nie można dzielić przez 0!";
    } else {
        $sum = $a / $b;
        echo "Wynik: $sum \r\n <br />";
    }
}

//     switch ($option) {

//         case 'addition':
//             echo addition();
//             break;

//         case 'subtraction':
//             echo subtraction();
//             break;

//         case 'multiplication':
//             echo multiplication();
//             break;

//         case 'division':
//             echo division();
//             break;
//     }
# code...
if (isset($_POST['number1']) && is_numeric($_POST['number1']) &&
    isset($_POST['number2']) && is_numeric($_POST['number2']) &&
    isset($_POST['operation'])) {

    $firstNumber = $_POST['number1'];
    $secondNumber = $_POST['number2'];
    switch ($_POST['operation']) {
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
