<?php
$storage = "storage.txt";
$current = file_get_contents($storage);
$current .= json_encode($_POST);
file_put_contents($storage, $current);
header("Location: thxPage.php");
?>