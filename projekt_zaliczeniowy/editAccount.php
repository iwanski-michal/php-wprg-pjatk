<?php session_start();
include("pathHelper.php");
if (!isset($_SESSION['email']) && empty($_SESSION['email']) && !isset($_SESSION['id']) && empty($_SESSION['id'])) {
    header("Location: index.php");
}
if(isset($_POST['submitForm'])){
    if ($_POST['submitForm'] == "changeEmail") {
        echo "Zmieniamy email";
    }
    if ($_POST['submitForm'] == "changeFirstName") {
        echo "Zmieniamy imię";
    }
    if ($_POST['submitForm'] == "changeLastName") {
        echo "Zmieniamy Nazwisko";
    }
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
                <v-container>
                    <v-btn href="dashboard.php" class="ma-2" outlined rounded color="primary"><v-icon>mdi-home</v-icon></v-btn>
                    <h1>Zmień swoje dane:</h1>
                    <v-row>

                        <v-col cols="4">
                            <v-card class="pa-4">
                                
                                <!-- Email: <br> -->
                                <!-- <input type="text" name="email"> <br> -->
                                <v-card-title>Zmień adres e-mail:</v-card-title>
                                <v-card-content>
                                    <form action="" method="POST">
                                        <v-text-field name="email" label="Email" placeholder="" value="<?php echo $_SESSION['email'] ?>" outlined></v-text-field>
                                        <v-text-field name="password" label="Type Your Password" placeholder="jan.kowalski@example.pl" outlined></v-text-field>
                                        <v-btn type="submit" name="submitForm" value="changeEmail" outlined color="indigo">Zapisz</v-btn>
                                    </form>
                                </v-card-content>
                            </v-card>
                        </v-col>

                        <v-col cols="4">
                            <v-card class="pa-4">
                                
                                <!-- Email: <br> -->
                                <!-- <input type="text" name="email"> <br> -->
                                <v-card-title>Zmień Imię</v-card-title>
                                <v-card-content>
                                    <form action="" method="POST">
                                        <v-text-field name="email" label="Email" placeholder="" value="<?php echo $_SESSION['firstName'] ?>" outlined></v-text-field>
                                        <v-text-field name="password" label="Type Your Password" placeholder="jan.kowalski@example.pl" outlined></v-text-field>
                                        <v-btn type="submit" name="submitForm" value="changeFirstName" outlined color="indigo">Zapisz</v-btn>
                                    </form>
                                </v-card-content>
                            </v-card>
                        </v-col>

                        <v-col cols="4">
                            <v-card class="pa-4">
                                
                                <!-- Email: <br> -->
                                <!-- <input type="text" name="email"> <br> -->
                                <v-card-title>Zmień Nazwisko</v-card-title>
                                <v-card-content>
                                    <form action="" method="POST">
                                        <v-text-field name="email" label="Email" placeholder="" value="<?php echo $_SESSION['lastName'] ?>" outlined></v-text-field>
                                        <v-text-field name="password" label="Type Your Password" placeholder="jan.kowalski@example.pl" outlined></v-text-field>
                                        <v-btn type="submit" name="submitForm" value="changeLastName" outlined color="indigo">Zapisz</v-btn>
                                    </form>
                                </v-card-content>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </v-main>
        </v-app>
    </div>

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