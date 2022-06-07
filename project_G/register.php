<?php session_start();
                 function checkData(){

                        if (isset($_POST['nickname']) && strlen($_POST['nickname']) && 
                            isset($_POST['email']) && strlen($_POST['email']) && 
                            isset($_POST['password']) && strlen($_POST['password']) 
                            ){


                            // $nickname = $_POST['nickname'];
                            // $lastName = $_POST['lastName'];
                            // $email = $_POST['email'];
                            // $password = $_POST['password'];
                            // tryRegister($nickname, $lastName, $email, $password);
                            return true;


                        }else{
                            $_SESSION['err'] = "Nie wszystkie pola zostały wypełnione";
                            return false;
                        }
                    }

                    function tryRegister($nickname, $email, $password){

                        $dbuser = 'root';
                        $dbpass = '';
                        // var_dump($email);\
                        // var_dump($password);
                        $pdo = new PDO("mysql:host=localhost;dbname=tictactoe", $dbuser, $dbpass) or die ("Błąd inicjalizaji bazy :C");

                        $sql = 'SELECT 1 from table WHERE id = ? LIMIT 1'; //LIMIT 1 żeby nie szukał dalej jak znajdzie już chociaż jeden rekord
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(1, $nickname, PDO::PARAM_INT); //bindujemy paramert pod znak zapytania wyżej
                        $stmt->execute();
                        if($stmt->fetchColumn()){
                            $_SESSION['err'] = "Znaleziono użytkownika o podanym adresie e-mail";
                            return false;
                        }  //

                        $stmt = $pdo->prepare("INSERT INTO users (email, nickname, password) VALUES (:email, :nickname, :pass);");
                        $stmt->execute(array(":email"=>$email,":nickname"=>$nickname, ":pass"=>$password));
                        var_dump($stmt);
                        var_dump($stmt->errorCode());
                    }

            if (isset($_SESSION['email'])) {
                unset($_SESSION['err']);
                header("Location: projekt.php");
            }
            
            if (!checkData()) {
                //cant login;
                header("Location: registerForm.php");
            }

            if (!tryRegister($_POST['nickname'], $_POST['email'], $_POST['password'])) {
                header("Location: registerForm.php");
            }
            
            
            ?>
    </div>




</body>

</html>