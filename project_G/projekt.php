<?php
session_start();
    $_SESSION['err'] = '';


if(isset($_POST['player-x']) && strlen($_POST['player-x']) && isset($_POST['player-o']) && strlen($_POST['player-o'])){
    if ($_POST['player-o']==$_SESSION['nickname']) { //sprawdzamy, czy jakiś agent nie chce grać sam ze sobą i nabijać sobie punkty
        $_SESSION['err'] = "Nie można grać samemu ze sobą!";

    }else{

        $dbuser = 'm29333_grzona';
        $dbpass = 'Grzona123';
        $pdo = new PDO("mysql:host=mysql.ct8.pl;dbname=m29333_grzona", $dbuser, $dbpass) or die ("Błąd inicjalizaji bazy :C");
        $stmt = $pdo->prepare("SELECT * FROM users WHERE nickname=:nickname");
        $stmt->execute(array(":nickname"=>$_POST['player-o']));
        
        if ($stmt->rowCount() == 0) {
            $_SESSION['err'] = "Brak takiego użytkownika lub zły nickname";
        }else{
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['nickname_2'] = $arr[0]['nickname'];
            $_SESSION['email_2'] = $arr[0]['email'];
            echo $_SESSION['nickname_2'];
            echo $_SESSION['email_2'];
            header("Location: test1.php");
        }
    }      
}


?>
<!DOCTYPE html>
<html lang="as">
<head>
    <title>Rozpocznij grę</title>
</head>
<body>
<a href="logout.php"><h3 style="text-align: right;">WYLOGUJ</h3></a>
<form action="" method="post">
    <div class="welcome">
        <h1>Rozpocznik gierkę</h1>
        <h2>PODAJ Nazwę drugiego gracza, który z tobą będzie grał</h2>
        <h3>(Gracz musi mieć zarejestrowany e-mail)</h3>

        <div class="p-name">
            <label for="player-x">ty, czyli X</label>
            <input type="text" id="player-x" name="player-x" value="<?php echo $_SESSION['nickname']?>" />
        </div>

        <div class="p-name">
            <label for="player-o"> GRACZ Nr.2</label>
            <input type="text" id="player-o" name="player-o" required />
        </div>

        <button type="submit">Start</button>
    </div>
    <?php echo $_SESSION['err'] ?>
</form>
</body>
</html>

