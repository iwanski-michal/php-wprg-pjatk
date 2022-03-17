<?php
$monthNumber = 2;
$year = 2020;
$monthDays = 0;
if ($monthNumber <= 7 && $monthNumber % 2 == 0) {
    $monthDays = 31;
} else {
    $monthDays = 30;
}
if ($monthNumber > 7 && $monthNumber % 2 == 1) {
    $monthDays = 30;
} else {
    $monthDays = 31;
}


if ($monthNumber == 2) {
    if (($year % 4 == 0 && $year % 100 != 0) ||
        ($year % 4 == 0 && $year % 400 == 0)) {
        $monthDays = 29;
    } else {
        $monthDays = 28;
    }
}
echo "$monthNumber miesiąc roku $year ma $monthDays dni";
?>