<?php session_start(); include("pathHelper.php");
    if (!isset($_SESSION['email']) && empty($_SESSION['email']) && !isset($_SESSION['id']) && empty($_SESSION['id'])) {
      header("Location: index.php");
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
        <?php include(ROOT_PATH."/components/appbar.php");?>
      <v-main>
        <v-container>
            <h1>Dashboard</h1>
            <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
    <v-list
          dense
          rounded
        >
          <v-list-item
            link
          >
            <v-list-item-icon>
              <v-icon>mdi-view-dashboard</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>Twoje Kursy</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item
            link
          >
            <v-list-item-icon>
              <v-icon>mdi-forum</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>Your class</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

        </v-list>
    </v-navigation-drawer>
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
      data(){
          return{
              drawer: false,
          }
      }
    })
  </script>
</body>
</html>
