<?php session_start(); 
    if (isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        header("Location: projekt.php");
    }
?> 
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Panel</title>
</head>

<body>
    <div class="main" style="text-align: center;">
        <h1>Zarejestruj się i zacznij grać!!!</h1>
        <form action="register.php" method="POST">
            Twój nick:<br>
            <input type="text" name="nickname"> <br>
            Email: <br>
            <input type="text" name="email"> <br>
            Hasło: <br>
            <input type="password" name="password"> <br>
            <br>
            <input type="submit" name value="Zarejestruj">
            <br>
            Masz konto? <a href="loginForm.php"> Zaloguj się </a>
        </form>
        <?php if (isset($_SESSION['err'])){echo $_SESSION['err'];}; ?>
        </div>


</body>

</html>