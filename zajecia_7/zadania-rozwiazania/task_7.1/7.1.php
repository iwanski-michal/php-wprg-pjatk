<!DOCTYPE html>
<html lang="en">

<head>
	<style>
		img {
			margin: 20px;
		}

		body {
			height: 100%;
			width: 100%;
			background-color: #333;
			color: whitesmoke;
			font-size: 16px;
			font-family: 'Lato';
			overflow: hidden;
		}

		.arrowed {
			position: relative;
			height: 100px;
			width: 100px;
			margin: auto;
			border: 1px solid rgba(0, 0, 0, 0.25);
		}

		.arrowed div {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
		}
		.arrowed div:hover {
			border: 3px solid red;
			border-width: 2px 2px 0 0;
		}

		.arrow-1 {
			height: 15px;
			width: 15px;
			border: 2px solid tomato;
			border-width: 2px 2px 0 0;
			transform: rotate(225deg);
		}

		.arrow-2 {
			height: 15px;
			width: 15px;
			border: 2px solid tomato;
			border-width: 2px 2px 0 0;
			transform: rotate(45deg);
		}
		.arrow-3 {
			height: 15px;
			width: 15px;
			border: 2px solid tomato;
			border-width: 2px 2px 0 0;
			transform: rotate(-45deg);
		}
	</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Galeria</title>
</head>

<body>
	<div style="text-align: center !important;">


		<?php

		$id = $_GET['id'];
		$imgDir = "img";
		$dir = scandir($imgDir);
		array_shift($dir);
		array_shift($dir);
		$imgName = $dir["$id"];
		echo "<img src=\"$imgDir/$imgName\" alt=\"$imgName\"><br>";
		$count = count($dir);

		if ($id < 0 || $id >= $count || !is_numeric($id)) {
			$imgId = 0;
		}

		$imgName = $dir["$id"];
		$first = 0;
		$last = $count - 1;
		if ($id < $count - 1) {
			$next = $id + 1;
		} else {
			$next = $count - 1;
		}
		if ($id > 0) {
			$prev = $id - 1;
		} else {
			$prev = 0;
		}

		?>
		<a href="<?php echo '7.1.php?id=' . $prev . ''?>"><div class="arrowed">
		<div class="arrow-1"> </div>
		</div></a>

		<a href="index.php"><div class="arrowed"><div class="arrow-3"></div></div></a>

		<a href="<?php echo '7.1.php?id=' . $next . ''?>"><div class="arrowed">
		<div class="arrow-2"> </div>
		</div></a>
		<?php
		echo '<a href="7.1.php?id=' . $prev . '"><button>Poprzednie</button></a>';
		echo "<a href=\"index.php\"><button>Powrót</button></a>";
		echo '<a href="7.1.php?id=' . $next . '"><button>Następne</button></a>';
		?>
	</div>


</body>