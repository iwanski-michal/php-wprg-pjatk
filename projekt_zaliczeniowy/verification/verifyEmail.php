<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div id="app">
      <v-app>
        <v-row class="d-flex align-center">
            <v-col cols="12" style="text-align: center;">

                
                <?php
session_start();
include('../pathHelper.php');
include(ROOT_PATH."/database.php");
include(ROOT_PATH."/verification/sendEmail.php");
$db = Database::getInstance()->getConnection();
$sendMl = new sendEmail();

$code= $_GET['code'];

#select * from users where code = $code
$stmt = $db->prepare("SELECT 1 FROM users WHERE verificationCode = :code LIMIT 1" );
$stmt->execute(array(":code"=>$code));
#check if there is any record in Query
if ($stmt->rowCount() == 0) {
    echo "<h2>Błędny kod lub zły link, wysłać email ponownie?</h2>";
    echo "<v-btn primary outlined>Wyślij e-mail jeszcze raz</v-btn>";
}
else {
    #update users set verified = 1 where verificationCode = $code
    $stmt = $db->prepare("UPDATE users SET verified = 1 WHERE verificationCode = :code" );
    $stmt->execute(array(":code"=>$code));
    echo "<h2>Twoje konto zostało aktywowane, możesz się zalogować</h2></br>";
    $_SESSION['err'] = '';
    echo "<v-btn href=\"../index.php\" primary outlined>Zaloguj się</v-btn>";
}


?>

</v-col>
        </v-row>

</v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data(){
          return{
              drawer: false,
          }
      }
    })
  </script>
</body>
</html>