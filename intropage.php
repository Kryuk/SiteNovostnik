<?php session_start();?>
<!DOCKTYPE html>
<html>
<head>
	<?php 
		require_once "functions/functions.php";
		require_once "blocks/head.php";
	?>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<?php
	if(!isset($_SESSION["session_username"])):
	header("location:auth.php");
	else:
	?>
	<div id="welcome">
	<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	  <p><a href="logout.php">Выйти</a> из системы</p>
	</div>	
	<?php endif; ?>
	<?php require_once "blocks/footer.php" ?>
</body>
</html>