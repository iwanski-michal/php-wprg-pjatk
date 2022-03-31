<?php
$arrayOfSubpages = array(
    array('nazwa'=>'podstrona 1', 'link'=>'site1.php', 'tresc'=>'Generyczna zawartość strony 1'),
    array('nazwa'=>'podstrona 2', 'link'=>'site2.php', 'tresc'=>'Generyczna zawartość strony 2'),
    array('nazwa'=>'podstrona 3', 'link'=>'site3.php', 'tresc'=>'Generyczna zawartość strony 3'),
    array('nazwa'=>'podstrona 4', 'link'=>'site4.php', 'tresc'=>'Generyczna zawartość strony 4'),
    array('nazwa'=>'podstrona 5', 'link'=>'site5.php', 'tresc'=>'Generyczna zawartość strony 5')
);
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
        <h1>Lista podstron!</h1>
        <?php
            var_dump($arrayOfSubpages);
        ?>
        <ul>
        </ul>
    </body>
</html>