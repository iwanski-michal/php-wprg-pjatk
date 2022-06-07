
<!--strona startowa ( forward do test1)-->

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="as">
<head>
    <title>killme</title>
</head>
<body>
<form method="post" action="test1.php">
    <div class="welcome">
        <h1>GRA W KÓŁKO I KRZYŻYK</h1>
        <h2>PODAJ NAZWY GRACZY</h2>

        <div class="p-name">
            <label for="player-x"> GRACZ Nr.1</label>
            <input type="text" id="player-x" name="player-x" required />
        </div>

        <div class="p-name">
            <label for="player-o"> GRACZ Nr.2</label>
            <input type="text" id="player-o" name="player-o" required />
        </div>

        <button type="submit">Start</button>
    </div>
</form>
</body>
</html>

