<?php session_start(); 
    if (isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        header("Location: dashboard.php");
    }
?>
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
      <v-main>
        <v-container style="text-align: center">
        <v-row class="d-flex justify-center">
        <v-col
          cols="12"
          sm="6"
          md="4"
        >
        <h1>Zarejestruj się</h1>
        <h3>I zdobądź dostęp do tysięcy kursów!</h3>
        <form action="register.php" method="POST">
            <!-- Email: <br> -->
            <!-- <input type="text" name="email"> <br> -->
            <v-text-field
            name="firstName"
            label="Imię"
            placeholder="Jan"
            outlined
          ></v-text-field>
          <v-text-field
            name="lastName"
            label="Nazwisko"
            placeholder="Nosek"
            outlined
          ></v-text-field>
          <v-text-field
            name="email"
            label="Email"
            placeholder="jan.Nosek@example.pl"
            outlined
          ></v-text-field>
          <v-text-field
          type="password"
          name="password"
          label="Hasło"
          placeholder="***********"
          outlined
        ></v-text-field>
        <v-text-field
          type="password"
          name="repeatPassword"
          label="Powtórz Hasło"
          placeholder="***********"
          outlined
        ></v-text-field>
          <v-btn
          type="submit"
          value="Zarejestruj"
          class="ma-2"
            outlined
            color="indigo"
            >
            Zarejestruj
            </v-btn>
            </form>
            <br>
            <p style="color: red">

                <?php if (isset($_SESSION['err'])){echo $_SESSION['err'];};
            // var_dump("XDDDDDDDDDD");
            // var_dump($_SESSION['err']);
            ?>
            </p>
            <br>
            <br>
            <v-col cols="12">

                
                Masz już konto?<v-btn
                href="index.php"
                class="ma-2"
                outlined
                rounded
                color="primary"
                >
                Zaloguj się
            </v-col>
        </v-col>
        </v-row>
        </div>
        </v-container>
      </v-main>
    </v-app>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
    })
  </script>
</body>
</html>