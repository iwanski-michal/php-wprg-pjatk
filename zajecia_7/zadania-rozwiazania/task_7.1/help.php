<div style="text-align: center;">
<?php

$id=$_GET['id'];
$imgDir="img";
$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);
$imgName=$dir["$id"];
echo "<img src=\"$imgDir/$imgName\" alt=\"$imgName\"><br>";
$count = count($dir);

if($id<0 || $id>=$count || !is_numeric($id)){
    $imgId=0;
}

$imgName=$dir["$id"];
$first=0;
$last = $count-1;
if($id<$count-1){
    $next=$id+1;
}
else{
    $next = $count-1;
}
if($id>0){
    $prev = $id-1;
}
else{
    $prev = 0;
}

echo '<a href="help.php?id='.$prev.'"><button>Poprzednie</button></a>';?>

    <a href="7.1.php"><button>HOME</button></a>
 
<?php echo '<a href="help.php?id='.$next.'"><button>Następne</button></a>';


?>
</div>
