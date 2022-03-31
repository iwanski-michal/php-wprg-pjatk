<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="main" style="text-align: center;">
        <h1> Zarejestruj się</h1>
        <form action="" method="POST">
            Imię:<br>
            <input type="text" name="firstName">
            <br>
            Nazwisko:<br>
            <input type="text" name="lastName"> <br>
            Email: <br>
            <input type="text" name="email"> <br>
            Hasło: <br>
            <input type="password" name="password"> <br>
            Powtórz hasło: <br>
            <input type="password" name="repeatPassword"> <br>
            <br>
            <input type="submit" name value="Wyślij formularz">

        </form>
        <span> Masz już konto? <a href="logowanie.php">Zaloguj się</a> </span>
            <?php 
            
            class user {

                public $firstName;
                public $lastName;
                public $email;
                public $password;
                public $repeatPassword;
                public $errors = array();
                    public function register(){

                        if (isset($_POST['firstName']) && strlen($_POST['firstName']) && 
                            isset($_POST['lastName']) && strlen($_POST['lastName']) && 
                            isset($_POST['email']) && strlen($_POST['email']) && 
                            isset($_POST['password']) && strlen($_POST['password']) && 
                            isset($_POST['repeatPassword']) && strlen($_POST['repeatPassword'])){
                            

                            $this->firstname = $_POST['firstName'];
                            $this->lastName = $_POST['lastName'];
                            $this->email = $_POST['email'];
                            $this->password = $_POST['password'];
                            $this->repeatPassword = $_POST['repeatPassword'];

                            if ( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ){
                                echo 'Błąd maila';
                                throw new Exception ('Błędny adres email', 2);
                                return false;
                                exit ();
                            }
                            else if ($this->password != $this->repeatPassword){
                                echo 'Hasła nie są zgodne';
                                throw new Exception ('Hasła nie są zgodne', 3);
                                return false;
                                exit ();
                            }
                            
                            return true;


                        }else{
                            echo 'Nie wszystkie pola zostały wypełnione';
                            throw new Exception('Nie wszystkie pola zostały wypełnione', 1);
                            return false;
                        }
                    }
                    public function save(){


                    }

            }
            $tablica = array();
            $user = new user();
            try{
                echo $user-> register();
            }
            catch(Exception $e){
                array_push($user->errors, $e->getMessage() );
                // var_dump ($user->errors);
            }

try
   {
      $pdo = new PDO('mysql:host=localhost;dbname=homestead', 'homestead', 'secret');
      echo 'Połączenie nawiązane!';
   }
   catch(PDOException $e)
   {
      echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
   }

            
            
            ?>
    </div>




</body>

</html>