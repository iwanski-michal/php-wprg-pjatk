<?php
session_start();
// var_dump($_SESSION['id']);
// var_dump($_SESSION['email']);

    if (empty($_SESSION['id']) && empty($_SESSION['email'])) {
        header("Location: loginForm.php");
    }

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
                        $dbuser = 'root';
                        $dbpass = '';
                        // var_dump($email);
                        // var_dump($password);
                        $pdo = new PDO("mysql:host=localhost;dbname=cars", $dbuser, $dbpass) or die ("Błąd inicjalizaji bazy :C");
                        $stmt = $pdo->prepare("SELECT * FROM samochody WHERE user_id=:userId");
                        $stmt->execute(array(":userId"=>$_SESSION['id']));
                        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        var_dump($arr);
echo '<table>';
echo '<tr>';
echo "<td>id</td>";
echo '<td>marka</td>';
echo '<td>model</td>';
echo '<td>rok</td>';
echo '<td>opis</td>';
echo '<td>edytuj</td>';
echo '</tr>';
foreach ($arr as $row) {

    echo '<tr>';
    echo "<td>".$row['id'] . "</td>";
    echo "<td>".$row['marka'] . "</td>";
    echo "<td>".$row['model'] . "</td>";
    echo "<td>".$row['rok'] . "</td>";
    echo "<td>".$row['opis'] . "</td>";
    echo '<td><a href="editCar.php?id=' . $row['id'] . '">edytuj dane</a> <br></td>';
    echo '</tr>';
}
echo '</table>';
// echo '<button><a href="index.php?itemId='.$prev.'">Poprzednie</a></button>';
// echo '<button><a href="index.php?itemId='.$next.'">Następne</a></button>';
?>

</body>
</html>