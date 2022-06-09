<?php session_start();



function checkData()
{
    // echo ("XDDDDDDDDDDDDDDDDDDDDDDDDDD");
    if (
        isset($_POST['firstName']) && strlen($_POST['firstName']) &&
        isset($_POST['lastName']) && strlen($_POST['lastName']) &&
        isset($_POST['email']) && strlen($_POST['email']) &&
        isset($_POST['password']) && strlen($_POST['password'])
    ) {
        if ($_POST['password']!=$_POST['repeatPassword']) {
            $_SESSION['err'] = "Wpisane hasła nie są takie same!";
            return false;
        }
        return true;
    } else {
        $_SESSION['err'] = "Nie wszystkie pola zostały wypełnione";
        return false;
    }
}

function tryRegister($firstName, $lastName, $email, $password)
{

    $dbuser = 'm29333_michal';
    $dbpass = 'Michal123';
    // var_dump($email);\
    // var_dump($password);
    $pdo = new PDO("mysql:host=mysql.ct8.pl;dbname=m29333_forsurenotstepik", $dbuser, $dbpass) or die("Błąd inicjalizaji bazy :C");

    $sql = 'SELECT 1 from users WHERE email = ? LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetchColumn()) {
        $_SESSION['err'] = "Znaleziono użytkownika o podanym adresie e-mail";
        return false;
    }  //

    $stmt = $pdo->prepare("INSERT INTO users (email, firstName, lastName, password) VALUES (:email, :firstName, :lastName, :pass);");
    $stmt->execute(array(":email" => $email, ":firstName" => $firstName, ":lastName" => $lastName, ":pass" => $password));
    header("Location: registerSuccess.php");
    return true;
}

if (isset($_SESSION['email'])) {
    unset($_SESSION['err']);
    header("Location: projekt.php");
}

if (!checkData()) {
    //cant login;
    header("Location: registerForm.php");
    exit();
}

if (!tryRegister($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'])) {
    header("Location: registerForm.php");
    exit();
}
// header("Location: projekt.php");

?>
</div>




</body>

</html>