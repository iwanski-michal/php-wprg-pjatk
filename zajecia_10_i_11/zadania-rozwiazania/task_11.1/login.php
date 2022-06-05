<?php session_start();
                 function checkData(){

                        if (isset($_POST['firstName']) && strlen($_POST['firstName']) && 
                            isset($_POST['lastName']) && strlen($_POST['lastName']) && 
                            isset($_POST['email']) && strlen($_POST['email']) && 
                            isset($_POST['password']) && strlen($_POST['password']) 
                            ){


                            // $firstname = $_POST['firstName'];
                            // $lastName = $_POST['lastName'];
                            // $email = $_POST['email'];
                            // $password = $_POST['password'];
                            // tryLogin($firstname, $lastName, $email, $password);
                            return true;


                        }else{
                            $_SESSION['err'] = "Nie wszystkie pola zostały wypełnione";
                            return false;
                        }
                    }

                    function tryLogin($firstname, $lastname, $email, $password){

                        $dbuser = 'root';
                        $dbpass = '';
                        // var_dump($email);
                        // var_dump($password);
                        $pdo = new PDO("mysql:host=localhost;dbname=cars", $dbuser, $dbpass) or die ("Błąd inicjalizaji bazy :C");
                        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND pass=:pass");
                        $stmt->execute(array(":email"=>$email, ":pass"=>$password));
                        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // var_dump($arr[0]);
                        print_r($arr);
                        echo "<br>";
                        print_r($arr[0]['id']);
                        echo $arr[0][0]->id;
                        $_SESSION['id'] = $arr[0]['id'];
                        $_SESSION['email'] = $arr[0]['email'];
                        $_SESSION['firstname'] = $arr[0]['firstName'];
                        $_SESSION['lastname'] = $arr[0]['lastName'];
                        header("Location: site.php");
                    }

            if (isset($_SESSION['email'])) {
                unset($_SESSION['err']);
                header("Location: site.php");
            }
            
            if (!checkData()) {
                //cant login;
                header("Location: loginForm.php");
            }
            tryLogin($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);
            
            ?>
    </div>




</body>

</html>