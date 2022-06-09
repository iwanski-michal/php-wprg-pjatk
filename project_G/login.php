<?php session_start();
                 function checkData(){

                        if (
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

                    function tryLogin($email, $password){

                        $dbuser = 'm29333_michal';
                        $dbpass = 'Michal123';
                        // var_dump($email);
                        // var_dump($password);
                        $pdo = new PDO("mysql:host=mysql.ct8.pl;dbname=m29333_forsurenotstepik", $dbuser, $dbpass) or die ("Błąd inicjalizaji bazy :C");
                        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND password=:pass");
                        $stmt->execute(array(":email"=>$email, ":pass"=>$password));

                        if ($stmt->rowCount() == 0) {
                            $_SESSION['err'] = "Błędny login lub hasło";
                            return false;
                        }

                        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // var_dump($arr[0]);
                        print_r($arr);
                        echo "<br>";
                        print_r($arr[0]['id']);
                        $_SESSION['id'] = $arr[0]['id'];
                        $_SESSION['email'] = $arr[0]['email'];
                        $_SESSION['nickname'] = $arr[0]['nickname'];
                        return true;
                    }

            if (isset($_SESSION['email'])) {
                unset($_SESSION['err']);
                header("Location: projekt.php");
            }
            
            if (!checkData()) {
                //cant login;
                var_dump($_POST);
                // header("Location: loginForm.php");
                exit();
            }

            if (!tryLogin($_POST['email'], $_POST['password'])) {
                header("Location: loginForm.php");
                exit();
            }
            header("Location: projekt.php");
            ?>
    </div>




</body>

</html>