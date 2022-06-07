<?php
$dbuser = 'root';
$dbpass = '';
$db = new PDO("mysql:host=localhost;dbname=cars", $dbuser,$dbpass) or die ("Błąd inicjalizaji bazy :C");
if(isset($_GET['itemId'])){
    $itemId=$_GET['itemId'];
}
else{
    $itemId=1;
}
if($itemId>1){
    $prev=$itemId-1;
}
else{
    $prev = 1;
}
$idMax = $itemId*5;
$idMin = $idMax-4;
$next=$itemId+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auta</title>
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
  text-align:center;
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
$sql = 'SELECT id,marka,model FROM samochody where id<='.$idMax. " and id>=".$idMin;
echo '<table>';
echo '<tr>';
echo "<td>id</td>";
echo '<td>marka</td>';
echo '<td>model</td>';
echo '<td>czytaj dalej</td>';
echo '</tr>';
foreach ($db->query($sql) as $row) {
    echo '<tr>';
    echo "<td>".$row['id'] . "</td>";
    echo "<td>".$row['marka'] . "</td>";
    echo "<td>".$row['model'] . "</td>";
    echo '<td><a href="additionalInfo.php?id=' . $row['id'] . '">Czytaj dalej</a> <br></td>';
    echo '</tr>';
}
echo '</table>';
echo '<button><a href="index.php?itemId='.$prev.'">Poprzednie</a></button>';
echo '<button><a href="index.php?itemId='.$next.'">Następne</a></button>';
?>

</body>
</html>