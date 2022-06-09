<?php
session_start();
$dbuser = 'm29333_grzona';
$dbpass = 'Grzona123';
$db = new PDO("mysql:host=mysql.ct8.pl;dbname=m29333_grzona", $dbuser,$dbpass) or die ("Błąd inicjalizaji bazy :C");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scoreboard</title>
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
.user{
    color: #040e69;
    background-color: #8793ff !important;
}
.ratioOver80{
    background-color: #83579d !important;
}
.ratioUnder80{
    background-color: #6d9521 !important;
}
.ratioUnder50{
    background-color: #d77900 !important;
}
.ratioUnder30{
    background-color: #cd3333 !important;
}
tr:hover {
          background-color: #ababab;
        }
    </style>
</head>
<body>

<?php
$sql = 'SELECT nickname, gamesPlayed, GamesWon FROM users ORDER BY GamesWon desc'; //wybieramy graczy sortując od największej do najmniejszej ilości wygranych
echo '<table>';
echo '<tr>';
echo "<td>nickname</td>";
echo '<td>rozegraneGry</td>';
echo '<td>Wygrane Gry</td>';
echo '<td>Skuteczność</td>';
echo '</tr>';
foreach ($db->query($sql) as $row) {
    echo '<tr';
    if ($_SESSION['nickname'] == $row[0]) {
        echo " class=\"user\"";
    }
    echo "><td>".$row[0] . "</td>";
    echo "<td>".$row[1] . "</td>";
    echo "<td>".$row[2] . "</td>";
    if ($row[1]==0) {
        echo "<td>Brak Danych</td>";
    }else{
        $winRatio = $row[2]/$row[1]*100;
        echo "<td class=\"";
        if ($winRatio < 30) {
            echo "ratioUnder30";
        }else if ($winRatio < 50) {
            echo "ratioUnder50";
        }else if ($winRatio < 80){
            echo "ratioUnder80";
        }else {
            echo "ratioOver80";
        }
        echo "\">$winRatio%</td>";
    }
    echo '</tr>';
}
echo '</table>';
?>
<a href="projekt.php"><h3 style="text-align: center;">Powrót do wyboru graczy</h3></a>

</body>
</html>