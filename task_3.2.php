<?php
function nationality($Nation){
    $countriesTable = array(
        'Niemcy' => 'Niemcem/Niemką',
        'Polska' => 'Polakiem/Polką',
        'Czechy' => 'Czechem/Czeszką',
        'Ukraina' => 'Ukraińcem/Ukrainką');
        return strtr($Nation, $countriesTable);
    }
$Nation = "Niemcy";
    echo "Mieszkaniec kraju $Nation jest ". nationality($Nation);