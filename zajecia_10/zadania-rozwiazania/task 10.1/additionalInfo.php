<?php
$dbuser = 'root';
$dbpass = '';
$db = new PDO("mysql:host=localhost;dbname=cars", $dbuser,$dbpass) or die ("Błąd inicjalizaji bazy :C");
$max=0;
foreach ($db->query('SELECT max(id) FROM samochody') as $row){
    $max=$row['max(id)'];
}
//var_dump($max);
$min=1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>car info</title>
    <style>
        body {
            text-align: center;
        }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:hover {
          background-color: #ababab;
        }
    </style>
</head>
<body>
<?php
if(isset($_GET['id'])&&$_GET['id']>=$min && $_GET['id']<=intval($max)){
    $sql = "SELECT * FROM samochody where id=".$_GET['id'];
    echo '<table>';
    echo '<tr>';
    echo "<td>id</td>";
    echo '<td>marka</td>';
    echo '<td>model</td>';
    echo '<td>cena</td>';
    echo '<td>rok</td>';
    echo '<td>opis</td>';
    echo '</tr>';
    foreach ($db->query($sql) as $row) {
        echo '<tr>';
        echo "<td>".$row['id'] ."</td>";
        echo '<td>'.$row['marka'] ."</td>";
        echo '<td>'.$row['model'] ."</td>";
        echo '<td>'.$row['cena'] ."</td>";
        echo '<td>'.$row['rok'] ."</td>";
        echo '<td>'.$row['opis'] ."</td>";
        echo '</tr>';
    }
    echo '</table>';
    echo '<button><a href="index.php">Powrót</a></button>';
}
else{
    echo "ERROR";
}
?>

</body>
</html>