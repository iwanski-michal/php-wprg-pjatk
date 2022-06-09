<?php
// require_once "projekt.php";
session_start();
function updatePlayedGames(){
    $dbuser = 'm29333_grzona';
    $dbpass = 'Grzona123';
    $pdo = new PDO("mysql:host=mysql.ct8.pl;dbname=m29333_grzona", $dbuser, $dbpass) or die("Błąd inicjalizaji bazy :C");

    $sql = 'UPDATE `users` SET gamesPlayed = gamesPlayed+1 WHERE email = ? OR email = ?'; //LIMIT 1 żeby nie szukał dalej jak znajdzie już chociaż jeden rekord
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_SESSION['email'], PDO::PARAM_STR); //pierwszy gracz update
    $stmt->bindParam(2, $_SESSION['email_2'], PDO::PARAM_STR); //drugi gracz update
    $stmt->execute();
}
function updateWonGames($winnerEmail){
    $dbuser = 'm29333_grzona';
    $dbpass = 'Grzona123';
    $pdo = new PDO("mysql:host=mysql.ct8.pl;dbname=m29333_grzona", $dbuser, $dbpass) or die("Błąd inicjalizaji bazy :C");
    $sql = 'UPDATE `users` SET GamesWon = GamesWon+1 WHERE email = ?'; //LIMIT 1 żeby nie szukał dalej jak znajdzie już chociaż jeden rekord
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $winnerEmail, PDO::PARAM_STR); 
    $stmt->execute();
}
/*-------------CHANGE TURN------------*/
function changeTurn(){
    //var_dump($_SESSION['turn']);
    if($_SESSION['turn']=="X"){
        $_SESSION['turn']="O";
    }
    else{
        $_SESSION['turn']="X";
    }
    $_SESSION['countTurn']++;
    /*-------------CHECK WINNER------------*/
    /*-------------CHECK HORIZONTALLY------------*/
    if(($_SESSION['board'][0][0]=="X" and $_SESSION['board'][0][1]=="X" and $_SESSION['board'][0][2]=="X") or ($_SESSION['board'][1][0]=="X" and $_SESSION['board'][1][1]=="X" and $_SESSION['board'][1][2]=="X") or ($_SESSION['board'][2][0]=="X" and $_SESSION['board'][2][1]=="X" and $_SESSION['board'][2][2]=="X"))
    {
        $_SESSION['WINNER']="X";
    }
    if(($_SESSION['board'][0][0]=="O" and $_SESSION['board'][0][1]=="O" and $_SESSION['board'][0][2]=="O") or ($_SESSION['board'][1][0]=="O" and $_SESSION['board'][1][1]=="O" and $_SESSION['board'][1][2]=="O") or ($_SESSION['board'][2][0]=="O" and $_SESSION['board'][2][1]=="O" and $_SESSION['board'][2][2]=="O"))
    {
        $_SESSION['WINNER']="O";
    }
    /*-------------CHECK VERTICALLY------------*/
    if(($_SESSION['board'][0][0]=="X" and $_SESSION['board'][1][0]=="X" and $_SESSION['board'][2][0]=="X") or ($_SESSION['board'][0][1]=="X" and $_SESSION['board'][1][1]=="X" and $_SESSION['board'][2][1]=="X") or ($_SESSION['board'][0][2]=="X" and $_SESSION['board'][1][2]=="X" and $_SESSION['board'][2][2]=="X"))
    {
        $_SESSION['WINNER']="X";
    }
    if(($_SESSION['board'][0][0]=="O" and $_SESSION['board'][1][0]=="O" and $_SESSION['board'][2][0]=="O") or ($_SESSION['board'][0][1]=="O" and $_SESSION['board'][1][1]=="O" and $_SESSION['board'][2][1]=="O") or ($_SESSION['board'][0][2]=="O" and $_SESSION['board'][1][2]=="O" and $_SESSION['board'][2][2]=="O"))
    {
        $_SESSION['WINNER']="O";
    }
    /*-------------CHECK DIAGONALLY------------*/
    if(($_SESSION['board'][0][0]=="X" and $_SESSION['board'][1][1]=="X" and $_SESSION['board'][2][2]=="X") or ($_SESSION['board'][0][2]=="X" and $_SESSION['board'][1][1]=="X" and $_SESSION['board'][2][0]=="X"))
    {
        $_SESSION['WINNER']="X";
    }
    if(($_SESSION['board'][0][0]=="O" and $_SESSION['board'][1][1]=="O" and $_SESSION['board'][2][2]=="O") or ($_SESSION['board'][0][2]=="O" and $_SESSION['board'][1][1]=="O" and $_SESSION['board'][2][0]=="O"))
    {
        $_SESSION['WINNER']="O";
    }
}
/*-------------RESET------------*/
if(isset($_GET['clear'])){
    unset($_SESSION['board']);
    unset($_SESSION['turn']);
    unset($_SESSION['WINNER']);
    unset($_SESSION['countTurn']);
}

/*-------------IF RESET OR FIRST TIME------------*/
if(empty($_SESSION['board'])){
    for($i=0;$i<3;$i++){
        for($j=0;$j<3;$j++){
            $_SESSION['board'][$i][$j]="";
        }
    }
    $_SESSION['WINNER']="none";
    $_SESSION['turn']="X";
    $_SESSION['countTurn']=0;
}


if(!empty($_SESSION['board'])){
    /*-------------FIRST ROW-------------*/
    if(isset($_GET['box00'])){
        $_SESSION['board'][0][0]=$_SESSION['turn'];
        changeTurn();
    }
    if(isset($_GET['box01'])){
        $_SESSION['board'][0][1]=$_SESSION['turn'];
        changeTurn();
    }
    if(isset($_GET['box02'])){
        $_SESSION['board'][0][2]=$_SESSION['turn'];
        changeTurn();
    }
    /*-------------SECOND ROW-------------*/
    if(isset($_GET['box10'])){
        $_SESSION['board'][1][0]=$_SESSION['turn'];
        changeTurn();
    }
    if(isset($_GET['box11'])){
        $_SESSION['board'][1][1]=$_SESSION['turn'];
        changeTurn();
    }
    if(isset($_GET['box12'])){
        $_SESSION['board'][1][2]=$_SESSION['turn'];
        changeTurn();
    }
    /*-------------THIRD ROW-------------*/
    if(isset($_GET['box20'])){
        $_SESSION['board'][2][0]=$_SESSION['turn'];
        changeTurn();
    }
    if(isset($_GET['box21'])){
        $_SESSION['board'][2][1]=$_SESSION['turn'];
        changeTurn();
    }
    if(isset($_GET['box22'])){
        $_SESSION['board'][2][2]=$_SESSION['turn'];
        changeTurn();
    }
}

//var_dump($_SESSION['board']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <style>
        table,td{
            text-align: center;
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 40px;
            align-items: center;
        }
        td{
            height: 80px;
            width: 80px;
        }
    </style>
    <meta charset="UTF-8">
</head>
<body>
    <a href="logout.php"><h3 style="text-align: right;">WYLOGUJ</h3></a>
<form method="get">
    <div class="tabela">
    <table>
        <center>
            <?php
            for($i=0;$i<3;$i++){
                echo '<tr>';
                for($j=0;$j<3;$j++){
                    if(!$_SESSION['board'][$i][$j]!=""&&$_SESSION['WINNER']=="none") {
                        echo '<td>';
                        echo '<input type="submit" name="box'.$i.$j.'"value="PLACE">';
                        echo '</td>';
                    }
                    else{
                        echo '<td>' . $_SESSION['board'][$i][$j] . '</td>';
                    }
                }
                echo '</tr>';
            }
            if($_SESSION['WINNER']<>"none"){
                if ($_SESSION['WINNER']=="X") {
                    echo $_SESSION['nickname'] ." wygrał z ". $_SESSION['nickname_2'];
                    updateWonGames($_SESSION['email']);
                }else{
                    echo $_SESSION['nickname_2'] ." wygrał z ". $_SESSION['nickname'];
                    updateWonGames($_SESSION['email_2']);
                }
                updatePlayedGames();
                echo "<br>";
                echo "<a href=\"scoreboard.php\">zobacz tablicę wyników</a>";
            }else if($_SESSION['countTurn']==9){
                echo '<h1> REMIS</h1>';
                updatePlayedGames();
            }
            
            ?>
        </center>

    </table>
    </div>
</form>

<form>
    <input type="submit" name="clear" value="RESET">
</form>
</body>
</html>