<?php
function simpleMultiplicationTable($size){
    echo '<table style="border: 1px solid black"; border-collapse: collapse;>';
    for ($i = 0; $i <$size; $i++){
        echo "<tr>";
        for ($j = 0; $j <$size; $j++){

            echo '<th style="border: 1px solid black">'.$j*$i."</th>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
simpleMultiplicationTable(10);