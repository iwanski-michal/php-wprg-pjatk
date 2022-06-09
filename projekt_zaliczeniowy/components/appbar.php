  <v-card>

    <v-app-bar
      absolute
      color="white"
      elevate-on-scroll
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>witaj <?php echo $_SESSION['email'] ?></v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon href="editAccount.php">
        <v-icon>mdi-account-cog</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
      <v-btn rounded outlined href="logout.php">
          wyloguj
          <v-icon>
              mdi-logout-variant
          </v-icon>
      </v-btn>
    </v-app-bar>
    
    <!-- <v-sheet
      id="scrolling-techniques-7"
      class="overflow-y-auto"
      max-height="600"
    >
      <v-container style="height: 1500px;">
      </v-container>
    </v-sheet> -->
  </v-card>
<script>

  new Vue({
    el: '#appBar',
    data(){
      return{
        drawer: false,
      }
    }
  })
  </script>