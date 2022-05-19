    <?php
        $file = fopen("data.csv","r")or die("nie udało się otworzyć pliku");
        while (!feof($file) ) {
           $arrayOfSubpages[] = fgetcsv($file);
        }
        fclose($file);
        var_dump($arrayOfSubpages);
        print_r($arrayOfSubpages);
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
        <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
input, textarea {
    /* border: none; */
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.delete{
    background-color: red;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    </head>
    <body>
    <table>
            <tr>
            <th>Nazwa podstrony</th>
            <th>link do strony</th>
            <th>treść podstrony</th>
            <th>akcja</th>
            </tr>
                <form action="process_data.php" method="post">
                    <?php
                foreach($arrayOfSubpages as $page){
                    $format = '<tr>
                    <td><input type="text" value="%s"> </input></td>
                    <td><input type="text" value="%s"> </input></td>
                    <td><textarea rows="2" cols="33">%s</textarea></td>s
                    <td><button class="delete" value="%s">usuń</button></td>
                    </tr>';
                    echo sprintf($format, $page['nazwa'], $page['link'], $page['tresc'], $page['nazwa'] );
                }
                ?>
    </table>
    <br>
    <div style="text-align: center;">

        <!-- <button onclick="addNew()" >dodaj nową podstronę</button> -->
        <button type="submit">zapisz</button>
    </div>
        </form>
        <!-- <script>
            function addNew(){
                var table = document.getElementByTagName("table");
                var newRow = "";
                newRow.InnerHTML = '<tr><td><input type="text" value="%s"> </input></td><td><input type="text" value="%s"> </input></td><td><textarea rows="2" cols="33">%s</textarea></td><td><button class="delete" value="%s">usuń</button></td></tr>';
                table.appendChild(newRow);
                alert("DziekiDziala");
            }
        </script> -->
        <?php
        var_dump($_POST);
        ?>
    </body>
</html>