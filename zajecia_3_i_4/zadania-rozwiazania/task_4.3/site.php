<?php session_start(); 
    if (!isset($_SESSION['email']) && !isset($_SESSION['pass'])) {
        header("Location: loginForm.php");
    }
?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div>
            <h1>JESTEŚ NA STRONIE</h1>
            Dane twojego konta: <br />
            imię: <?php echo($_SESSION['firstname'])?> <br />
            nazwisko: <?php echo($_SESSION['lastname'])?> <br />
            email: <?php echo($_SESSION['email'])?> <br />
        </div>

        <a href="logout.php">wyloguj</a>
    </body>
</html>