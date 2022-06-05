<?php session_start();
            $savedEmail = "test@test.com";
            $savedPassword = "pass";

                 function checkData(){

                        if (isset($_POST['firstName']) && strlen($_POST['firstName']) && 
                            isset($_POST['lastName']) && strlen($_POST['lastName']) && 
                            isset($_POST['email']) && strlen($_POST['email']) && 
                            isset($_POST['password']) && strlen($_POST['password']) 
                            ){

                            $firstname = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            // if ( $email != $savedEmail ) {
                            //     $_SESSION['err'] = "Brak konta o podanym adresie e-mail";
                            //     return false;
                            // }
                            // if ($password != $savedPassword ) {
                            //     $_SESSION['err'] = "Błędne hasło";
                            //     return false;
                            // }
                            // tryLogin($firstname, $lastName, $email, $password);
                            return true;


                        }else{
                            $_SESSION['err'] = "Nie wszystkie pola zostały wypełnione";
                            return false;
                        }
                    }

                    function tryRegister($firstName, $lastName, $email, $password){

                        $dbuser = 'root';
                        $dbpass = '';
                        $pdo = new PDO("mysql:host=localhost;dbname=cars", $dbuser,$dbpass) or die ("Błąd inicjalizaji bazy :C");
                        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                        // var_dump($hashedPassword);
                        // echo $hashedPassword;
                        $stmt = $pdo->prepare("INSERT INTO users (email, firstname, lastname, pass) VALUES (?, ?, ?, ?)");
                        $stmt->execute($email, $firstName, $lastName, $hashedPassword);
                        

                        $_SESSION['email'] = $email;
                        $_SESSION['firstname'] = $firstName;
                        $_SESSION['lastname'] = $lastName;
                        $_SESSION['pass'] = $password;
                        // $stmt = null;
                        
                    }
            if (!checkData($savedEmail, $savedPassword)) {
                echo "loginForm.php";
                //cant login;
                // header("Location: loginForm.php");
            }
            tryRegister($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);
            ?>
    </div>




</body>

</html>