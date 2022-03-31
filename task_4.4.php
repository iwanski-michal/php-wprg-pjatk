<?php
$checkIterations = 0;
function isPrime($number)
{
    global $checkIterations;
    $checkIterations++;
    if ($number == 0 || $number == 1) {
        return false;
    }
 
    if ($number == 2){
        return true;
    }
    if ($number % 2 == 0) {
        return false;
    }

    for($i=3; $i <= ceil(sqrt($number)); $i+=2){//zaokrąglamy pierwiastek w górę
        //dodajemy $i+2 żeby nie sprawdzać liczb, które są podzielne przez 2 bo to bez sensu, bo wyżej to sprawdziliśmy
        $checkIterations++;
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
$numberToCheck = 16127;
echo "<h1> Liczba $numberToCheck";

if (!(isPrime($numberToCheck))) {
echo " nie ";
}

echo " jest pierwsza";

echo " Liczba iteracji: $checkIterations";