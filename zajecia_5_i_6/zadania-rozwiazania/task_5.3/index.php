<?php
    $rows = array_map('str_getcsv', file('data.csv'));
    $header = array_shift($rows);
    $arrayOfSubpages = array();
    foreach($rows as $row) {
        $arrayOfSubpages[] = array_combine($header, $row);
    }
    var_dump($arrayOfSubpages);
    echo "<br> ";
    echo "<br> ";
    $arrayOfSubpages2 = array(
        array('nazwa'=>'podstrona 1', 'link'=>'site1', 'tresc'=>'Generyczna zawartość strony 1'),
        array('nazwa'=>'podstrona 2', 'link'=>'site2', 'tresc'=>'Generyczna zawartość strony 2'),
        array('nazwa'=>'podstrona 3', 'link'=>'site3', 'tresc'=>'Generyczna zawartość strony 3'),
        array('nazwa'=>'podstrona 4', 'link'=>'site4', 'tresc'=>'Generyczna zawartość strony 4'),
        array('nazwa'=>'podstrona 5', 'link'=>'site5', 'tresc'=>'Generyczna zawartość strony 5'),
        array('nazwa'=>'podstrona 6', 'link'=>'site6', 'tresc'=>'Generyczna zawartość strony 6')
    );
    var_dump($arrayOfSubpages2);
    echo "<br> ";
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
        <ul>
        <?php
            var_dump($arrayOfSubpages);
            foreach ($arrayOfSubpages as $page) {
                $format = '<li><a href="index.php?link=%s">%s</a></li>';
                echo sprintf($format, $page['link'], $page['link']);
            }
            if (isset($_GET["link"])) {
                # code...
                $siteFound = false;
                foreach ($arrayOfSubpages as $page) {
                    if ($_GET["link"]==$page['link']) {
                        echo "<h1>".$page['nazwa']."</h1>";
                        echo "<span>".$page["tresc"]."</span>";
                        $siteFound = true;
                        break;
                    }
                }
                if (!$siteFound) {
                    echo "podana strona nie została znaleziona, sprawdź link i spróbuj ponownie";
                    echo '<a href="index.php"><button>Zabierz mnie stąd!</button></a>';
                }
            }else{
                echo "<h1>".$arrayOfSubpages[0]["nazwa"]."</h1>";
                echo "<span>".$arrayOfSubpages[0]["tresc"]."</span>";
            }
        ?>
        </ul>
    </body>
</html>