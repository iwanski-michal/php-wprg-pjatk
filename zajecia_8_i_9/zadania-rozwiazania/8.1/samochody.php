<?php
include "cars.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $carArray=array();
    if(($handle=fopen('auta.csv',"r"))!=FALSE){
        $i=0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $carArray[$i] = new car($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
            $i++;


        }
        fclose($handle);
        for($i=0;$i<sizeof($carArray);$i++){
            if($carArray[$i]->getId()==$id){
                $chosenCar=$carArray[$i];
            }
        }
    }
    if($chosenCar!=null) {
        echo '<img src="foto/'.$chosenCar->getPhoto().'" width="800" height="600"> </br>';
        echo 'Marka: '.$chosenCar->getMake().'</br>';
        echo 'Model: '.$chosenCar->getModel().'</br>';
        echo 'Rocznik: '.$chosenCar->getYear().'</br>';
        echo 'Pojemność silnika: '.$chosenCar->getCapacity().'</br>';
        echo 'Cena: '.$chosenCar->getPrice().'zl</br>';
        echo '</br></br>';
        echo '<a href="8.1.php">wróc do Lki</a>';
    }
    else{
        echo '<h1> Nie ma auta o podanym id </h1>';
    }
}

