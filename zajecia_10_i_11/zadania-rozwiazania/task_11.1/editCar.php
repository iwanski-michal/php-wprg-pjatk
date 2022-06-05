<?php
session_start();
var_dump($_SESSION['id']);
if (empty($_SESSION['id']) && empty($_SESSION['email'])) {
    header("Location: loginForm.php");
}
$dbuser = 'root';
$dbpass = '';
// var_dump($email);
// var_dump($password);
$pdo = new PDO("mysql:host=localhost;dbname=cars", $dbuser, $dbpass) or die ("Błąd inicjalizaji bazy :C");
$stmt = $pdo->prepare("SELECT * FROM samochody WHERE user_id=:userId AND id=:car_id");
$stmt->execute(array(":userId"=>$_SESSION['id'], ":car_id"=>$_GET['id']));
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($arr);
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
<form action="" method="POST">
<?php
echo '<table>';
echo '<tr>';
echo '<td>id</td>';
echo '<td>marka</td>';
echo '<td>model</td>';
echo '<td>rok</td>';
echo '<td>opis</td>';
echo '</tr>';
  foreach($arr as $car){
    $format = '<form><tr>
    <td>%s</td>
    <td><input type="text" value="%s"> </input></td>
    <td><input type="text" value="%s"> </input></td>
    <td><input type="date" value="%s"> </input></td>
    <td><textarea rows="2" cols="33">%s</textarea></td>s
    </tr>';
    echo sprintf($format, $car['id'], $car['marka'], $car['model'], $car['opis'], $car['id']);
}
?>
<input type="submit" name value="save">
</table>
</form>
<?php

?>

</body>
</html>