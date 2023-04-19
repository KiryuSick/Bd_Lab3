<?php
	$bd = new mysqli('localhost','root','','firmadogovor'); 
	if ($bd->connect_error) {
	die("Помилка підключення: " . $bd->connect_error);
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Main</title>
	<meta charset="cp1251">
	<meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style>
	.container {
		width: 500px;
	}
	.error {
		color: #FF0000;
	}
	</style>
</head>

<body>
	<div class="container">
	<div class="card-panel blue lighten-3">Query</div>
	<div class="center">
	
	
	</div>
	</div>
</body>
</html>