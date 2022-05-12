<?php
        $file = fopen("data.csv","r")or die("nie udało się otworzyć pliku");
        while (!feof($file) ) {
           $arrayOfSubpages[] = fgetcsv($file);
        }
fclose($file);
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>edytuj</title>
</head>
<body>
<h2>Menu:</h2>
<?php
        echo '<ul>';
        echo "<li> <a href='edit.php'>Edytuj plik</a></li>";
            foreach($arrayOfSubpages as $page)
            {
                  echo "<li> <a href='index.php?1=".$page["1"]."'>".$page["0"]."</a></li>";
            }
    echo '</ul>';?>


<div style="text-align: center;">
<h2>Zapisane podstrony:</h2>
<?php
        $i=1;
        $file = fopen("data.csv","r")or die("umarłem");
        while (!feof($file) ) {
           echo "Podstrona nr: ".$i." \"" .fgets($file) . "\"<br> ";
           $i++;
        }
fclose($file);
?>

<h3>Dodaj nową podstronę</h3>
<form action="handle.php" method="post">
    <label for="name1">Nazwa strony</label><br>
    <input type="text" id="name1" name="nameAdd"><br>
    <label for="insides1">Treść</label><br>
    <input type="text" id="insides1" name="insidesAdd"><br>
    <input type="submit" name="add">
</form>
<h3>Usuń wybraną podstronę</h3>
<form action="handle.php" method="post">
    <label for="lineRemove">Linia do usunięcia</label><br>
    <input type="number" id="lineRemove" name="lineRemove" min="0" max="<?php echo count($arrayOfSubpages);?>"><br>
    <input type="submit" name="del">
</form>

<h3>Edytuj podstronę</h3>
<form action="handle.php" method="post">
    <label for="lineToEdi">Linia do edycji</label><br>
    <input type="number" id="lineEdit" name="lineToEdit" min="1" max="<?php echo count($arrayOfSubpages);?>" required><br>
    <label for="namEdit">Edycja nazwy</label><br>
    <input type="text" id="namEdit" name="namEdit"><br>
    <label for="insidesEdit">Linia do edycji</label><br>
    <input type="text" id="insidesEdit" name="insidesEdit"><br>
    <input type="submit" name="edit">
</form>
</div>
</body>
</html>