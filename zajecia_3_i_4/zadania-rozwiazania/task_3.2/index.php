<?php
function isPrime($number)
{
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
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
if (isset($_POST['testedNumber']) && is_numeric($_POST['testedNumber'])) {
    $answer = "";
    $numberToCheck = $_POST['testedNumber'];
    if (!(isPrime($numberToCheck))) {
    $answer = "Nie ";
    }
    $answer = $answer."jest to liczba pierwsza";
    
}
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <form action="" method="post">
            <input type="number" name="testedNumber" placeholder="Twój kandydat na liczbę pierwszą" value="<?php if(isset($_POST['testedNumber'])){echo $_POST['testedNumber'];}?>"/>
            <input type="submit" value="SPRAWDŹ!">
            <br/>
            <?php echo "$answer" ?>
        </form>
    </body>
</html>

