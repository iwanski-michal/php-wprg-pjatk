<?php session_start();
include("pathHelper.php");
include("database.php");
include(ROOT_PATH."/verification/sendEmail.php");

$db = Database::getInstance()->getConnection();
$sendMl = new sendEmail();
// var_dump($db);

function checkData()
{
    // echo ("XDDDDDDDDDDDDDDDDDDDDDDDDDD");
    // var_dump($_POST);
    // exit;
    if (
        isset($_POST['firstName']) && strlen($_POST['firstName']) &&
        isset($_POST['lastName']) && strlen($_POST['lastName']) &&
        isset($_POST['email']) && strlen($_POST['email']) &&
        isset($_POST['password']) && strlen($_POST['password']) &&
        isset($_POST['userType']) && strlen($_POST['userType'])
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

function tryRegister($db,$sendMl, $firstName, $lastName, $email, $password, $userType)
{
    $verificationCode = rand();
    $sql = 'SELECT 1 from users WHERE email = ? LIMIT 1';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetchColumn()) {
        $_SESSION['err'] = "Znaleziono użytkownika o podanym adresie e-mail";
        return false;
    }  //
    $stmt = $db->prepare("INSERT INTO users (email, firstName, lastName, password, userType, verificationCode) VALUES (:email, :firstName, :lastName, :pass, :userType, :verificationCode);");
    $stmt->execute(array(":email" => $email, ":firstName" => $firstName, ":lastName" => $lastName, ":pass" => $password, ":userType" => $userType, ":verificationCode" => $verificationCode));
    $sendMl->send($verificationCode, $email, $firstName, $lastName);
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

if (!tryRegister($db, $sendMl, $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['userType'])) {
    header("Location: registerForm.php");
    exit();
}
// header("Location: projekt.php");

?>
</div>




</body>

</html>