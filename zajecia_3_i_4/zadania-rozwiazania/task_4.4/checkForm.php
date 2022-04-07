<?php
var_dump($_POST);

if(isset($_COOKIE['voted']) && $_COOKIE['voted'] == true)
{ 
    header("Location: index.php");
}else{
    echo "XD";
    setcookie("voted",true, time() + (60), "/");
    header("Location: index.php?voted=true");
}