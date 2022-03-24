<?php
function censor($zdanie){
    $badWords = array(
        'Fuck' => 'F**k',
        'kurwa' => 'k***a',
        'chuj' => 'c**j',
        'japierdole' => 'j********e',
        'jebać' => 'j***ć',
        'PIS' => '***** ***');
    echo strtr($zdanie, $badWords);
}
$zdanieDoSprawdzenia = "kurwa japierdole nie chce mi się tego PHP-a";
censor($zdanieDoSprawdzenia);
?>

