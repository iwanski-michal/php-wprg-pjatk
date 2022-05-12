<?php
$imgDir="flaga";
$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);


$img=imagecreatetruecolor(400, 300);
$red=imagecolorallocate($img,255,0,0);
$white=imagecolorallocate($img,255,255,255);
$img_spacer = imagecreatetruecolor(400, 300);
imagefilledrectangle($img_spacer, 0, 0, 400, 150, $white);


imagefill($img,0,0,$red);
imagefilledrectangle($img, 0, 0, 400, 150, $white);
imagejpeg($img,"flaga/polska.jpg");
// imagedestroy($img);


$img=imagecreatetruecolor(600, 300);
$red=imagecolorallocate($img,255,0,0);
$white=imagecolorallocate($img,255,255,255);
$blue=imagecolorallocate($img,0,0,255);

echo "<br/>";
imagefill($img,0,0,$red);
imagefilledrectangle($img, 201, 0, 400, 300, $white);
imagefilledrectangle($img, 0, 0, 200, 300, $blue);
imagejpeg($img,"flaga/francja.jpg");
// imagedestroy($img);







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color: black;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria</title>
</head>
<body>
<?php
foreach ($dir as $a){
    echo "<img src=\"$imgDir/$a\" alt=\"$a\">";
}
?>
</body>
</html>