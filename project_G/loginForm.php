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
    <title>Document</title>
</head>

<body>
    <div class="main" style="text-align: center;">
        <h1> Zaloguj się</h1>
        <form action="login.php" method="POST">
            Email: <br>
            <input type="text" name="email"> <br>
            Hasło: <br>
            <input type="password" name="password"> <br>
            <br>
            <input type="submit" name value="Zaloguj">
            <br>
            Nie masz konta? <a href="registerForm.php"> Zarejestruj się! </a>
        </form>
        <?php if (isset($_SESSION['err'])){echo $_SESSION['err'];}; ?>
        </div>


</body>

</html>