<?php
include "cars.php";

?>
<style>
    img{
        border-radius: 500%;
        margin: 30px;
        border: solid #0F21ADFF 5px;
        width: 400px;
        height: 400px;
    }
    img:hover{

    }
    body{
        background-color: #ffffff;
    }

    h1{
        color: #0F21ADFF;
        display: flex;
        justify-content: center;
    }
</style>
<head>
    <title>Lka.word</title>
</head>
<body>
<h1>Galeria WORD'u</h1>
<div style="display: flex; justify-content: center">



    <?php
    $carArray=array();
    if(($handle=fopen('auta.csv',"r"))!=FALSE){
        $i=0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $carArray[$i] = new car($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
            $i++;


        }
        fclose($handle);
    }
    echo '<table>';
    foreach ($carArray as $value){
        echo '<tr>';
        echo '<td>';
        echo '<a href="samochody.php?id='.$value->getId().'"> <img src="foto/'.$value->getPhoto().'" width="500" height="300"> </a>';

        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';

    ?>
</div>
</body>
