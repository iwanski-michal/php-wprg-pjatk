<?php
var_dump($_POST);
# code...
if ( isset($_POST['number1']) && is_numeric($_POST['number1']) &&
    isset($_POST['number2']) && is_numeric($_POST['number2']) &&
    isset($_POST['operation'])
){
    echo "Działa";
}else{
    echo "BAD INPUT";
    echo "<a href=\"index.html\"><button type=\"button\" >Spróbuj jeszcze raz</button></a>";

}