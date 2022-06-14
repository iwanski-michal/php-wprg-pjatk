<?php session_start();
include("database.php");
$db = Database::getInstance()->getConnection();
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

                    function tryLogin($db, $email, $password){

                        #check if user is verified
                        $sql = 'SELECT 1 from users WHERE email = ? AND isVerified = 1 LIMIT 1';
                        $stmt = $db->prepare($sql);
                        $stmt->bindParam(1, $email, PDO::PARAM_STR);
                        $stmt->execute();
                        if (!$stmt->fetchColumn()) {
                            $_SESSION['err'] = "Nie zweryfikowano konta";
                            return false;
                        }



                        $stmt = $db->prepare("SELECT * FROM users WHERE email=:email AND password=:pass");
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
                        $_SESSION['firstName'] = $arr[0]['firstName'];
                        $_SESSION['lastName'] = $arr[0]['lastName'];
                        return true;
                    }

            if (isset($_SESSION['email'])) {
                unset($_SESSION['err']);
                header("Location: dashboard.php");
            }
            
            if (!checkData()) {
                //cant login;
                header("Location: index.php");
                exit();
            }

            if (!tryLogin($db, $_POST['email'], $_POST['password'])) {
                header("Location: index.php");
                exit();
            }
            header("Location: dashboard.php");
            ?>
    </div>




</body>

</html>