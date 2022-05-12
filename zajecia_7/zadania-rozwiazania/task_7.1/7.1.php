<?php
$imgDir="img";
$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);
$count = count($dir);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img{
            margin: 20px;
        }

 body { 
	height: 100%; width: 100%; 
	background-color: #333; 
	color: whitesmoke; 
	font-size: 16px; 
	font-family: 'Lato';
	overflow: hidden;
} 
.arrowed {
	position: relative;
	height: 200px; width: 200px;
	margin: auto;
	border: 1px solid rgba(0,0,0,0.25);
}

.arrowed div {
	position: absolute;
	top: 0; bottom: 0; left: 0; right: 0;
	margin: auto;
}
.arrow-1 {
	height: 15px; width: 15px;
	border: 2px solid tomato;
	border-width: 2px 2px 0 0;
	transform: rotate(225deg);
}
.arrow-2 {
	height: 15px; width: 15px;
	border: 2px solid tomato;
	border-width: 2px 2px 0 0;
	transform: rotate(45deg);
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria</title>
</head>
<body>
    <div style="text-align: center !important;">
    <div class="arrowed">
			<div class="arrow-1"> </div>
	</div>

        <?php
$id=1;
$counter = 0;
foreach ($dir as $a){
    echo "<a href='help.php?id=".$id."'>";
    echo "<img src=\"$imgDir/$a\" alt=\"$a\" height='220px' width='200px'>";
    echo "</a>";
    $id++;
    $counter++;
    if($counter == 5){
        break;
    }
}
?>
<a>
    <div class="arrowed">
        <div class="arrow-2"></div>
    </div>
</a>
</div>


</body>