<?php session_start();
            $savedEmail = "test@test.com";
            $savedPassword = "pass";

                 function checkData($savedEmail, $savedPassword){

                        if (isset($_POST['firstName']) && strlen($_POST['firstName']) && 
                            isset($_POST['lastName']) && strlen($_POST['lastName']) && 
                            isset($_POST['email']) && strlen($_POST['email']) && 
                            isset($_POST['password']) && strlen($_POST['password']) 
                            ){
                            

                            $firstname = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            if ( $email != $savedEmail ) {
                                $_SESSION['err'] = "Brak konta o podanym adresie e-mail";
                                return false;
                            }
                            if ($password != $savedPassword ) {
                                $_SESSION['err'] = "Błędne hasło";
                                return false;
                            }
                            tryLogin($firstname, $lastName, $email, $password);
                            return true;


                        }else{
                            $_SESSION['err'] = "Nie wszystkie pola zostały wypełnione";
                            return false;
                        }
                    }

                    function tryLogin($firstname, $lastname, $email, $password){
                        $_SESSION['email'] = $email;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['pass'] = $password;
                        header("Location: site.php");
                    }
            if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
                unset($_SESSION['err']);
                header("Location: site.php");
            }
            
            if (!checkData($savedEmail, $savedPassword)) {
                //cant login;
                header("Location: loginForm.php");
            }
            
            ?>
    </div>




</body>

</html>