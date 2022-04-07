<?php
$countries = array(
"Niemcy"=>100,
"Holandia"=>200,
"Polska"=>500,
"Portugalia"=>1000,
"Hiszpania"=>300);
if (isset($_POST['numberOfPeople']) && !empty($_POST['numberOfPeople']) && is_numeric($_POST['numberOfPeople']) && $_POST['numberOfPeople']>0
&& isset($_POST['startDate']) && !empty($_POST['startDate'])
&& isset($_POST['endDate']) && !empty($_POST['endDate'])
&& isset($_POST['country']) && !empty($_POST['country']) && array_key_exists($_POST['country'], $countries)
){
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['endDate']);
    $country = $_POST['country'];
    $numberOfPeople = $_POST['numberOfPeople'];
    $dateNow = date('Y-m-d');
    if ($startDate < $dateNow || $endDate < $dateNow) {
        echo "Wybrana data jest z przeszłości! <br/> Nie obsługujemy jeszcze wycieczek w przeszłość!";
        return;
    }else if ($startDate > $endDate) {
        echo "Data wyjazdu jest późniejsza niż data wyjazdu.";
        return;
    }
    $daysCount = $startDate->diff($endDate)->format('%r%a')+1;
    // echo "Działamy dalej";
    // echo "Długość wycieczki: $daysCount";
    // echo "cena: $countries[$country]";
    $priceForTrip = $daysCount*$numberOfPeople*$countries[$country];
    $answer = "Cena wycieczki dla $numberOfPeople osób, do kraju $country na $daysCount dni będzie wynosić $priceForTrip polskich złotych [PLN]";
}else{
    $answer = "Nie wszystkie pola zostały wypełnione, lub są wypełnione błędnie. Spróbuj jeszcze raz";
}
// var_dump($_POST);
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
            <label>data wyjazdu: &nbsp </label><input type="date" name="startDate" value="<?php if(isset($_POST['startDate']))echo $_POST['startDate']; else echo date('Y-m-d'); ?>"><br />
            <label>data przyjazdu: </label><input type="date" name="endDate" value="<?php if(isset($_POST['endDate']))echo $_POST['endDate']; else echo date('Y-m-d'); ?>"><br />
            <label>Wybrany kraj: &nbsp </label><select name="country" id="country">
                <?php foreach ($countries as $country => $price){
                    echo "<option value=$country>$country: $price zł/doba/os</option>";

                }?>
            </select><br/>
            <label>Liczba osób:&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="number" name="numberOfPeople" value="<?php if(isset($_POST['numberOfPeople'])){echo $_POST['numberOfPeople'];}?>"/><br/>
            <input type="submit" value="Przelicz koszt wycieczki"><br/>
            <?php if (isset($answer))echo $answer;?>
        </form>
        <script src="" async defer></script>
    </body>
</html>