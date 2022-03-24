<?php
function getDateFromPesel($pesel){

$year = substr($pesel, 0, 2);
$month = substr($pesel, 2, 2);
$day = substr($pesel, 4, 2);
if ($month >= 12){
    $year += 2000;
    $month -=20;
}else{
    $year += 1900;
}
if ($month < 10){
    $month = "0$month";
}

echo "$day-$month-$year";
}

$pesel = "00310908416";
getDateFromPesel($pesel);
