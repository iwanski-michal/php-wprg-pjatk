<?php
$imgDir="flaga";
$dir = scandir($imgDir);
array_shift($dir);
array_shift($dir);

//Polska
$img=imagecreatetruecolor(400, 300);
$red=imagecolorallocate($img,255,0,0);
$white=imagecolorallocate($img,255,255,255);
$img_spacer = imagecreatetruecolor(400, 300);
imagefilledrectangle($img_spacer, 0, 0, 400, 150, $white);


imagefill($img,0,0,$red);
imagefilledrectangle($img, 0, 0, 400, 150, $white);
imagejpeg($img,"flaga/polska.jpg");
imagedestroy($img);
echo "<br/>";

//Francja
$img=imagecreatetruecolor(600, 300);
$red=imagecolorallocate($img,255,0,0);
$white=imagecolorallocate($img,255,255,255);
$blue=imagecolorallocate($img,0,0,255);

echo "<br/>";
imagefill($img,0,0,$red);
imagefilledrectangle($img, 200, 0, 400, 300, $white);
imagefilledrectangle($img, 0, 0, 200, 300, $blue);
imagejpeg($img,"flaga/francja.jpg");
imagedestroy($img);

// Szwecja
echo "<br/>";
$img=imagecreatetruecolor(600, 300);
$yellow=imagecolorallocate($img,255,211,0);
$blue=imagecolorallocate($img,0,0,255);

imagefill($img,0,0,$blue);
imagefilledrectangle($img, 100, 0, 140, 300, $yellow);
imagefilledrectangle($img, 0, 100, 600, 140, $yellow);
imagejpeg($img,"flaga/Szwecja.jpg");
imagedestroy($img);


// Norwegia
$img=imagecreatetruecolor(600, 300);
$red=imagecolorallocate($img,255,0,0);
$white=imagecolorallocate($img,255,255,255);
$blue=imagecolorallocate($img,0,0,255);

imagefill($img,0,0,$red);
imagefilledrectangle($img, 100, 0, 160, 300, $white);
imagefilledrectangle($img, 0, 100, 600, 160, $white);
imagefilledrectangle($img, 110, 0, 150, 300, $blue);
imagefilledrectangle($img, 0, 110, 600, 150, $blue);
imagejpeg($img,"flaga/Norwegia.jpg");
imagedestroy($img);






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