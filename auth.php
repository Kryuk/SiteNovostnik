<?php
	session_start();
	require_once "functions/connect.php";
	if(isset($_SESSION['session_username'])){
		header("Location: intropage.php");
	}
	connectDB(); 
	global $mysqli;
	if(isset($_POST["login"])){
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$username=htmlspecialchars($_POST['username']);
			$password=htmlspecialchars($_POST['password']);
			$query =$mysqli->query("SELECT * FROM userlist WHERE username='".$username."'");
			$numrows=mysqli_num_rows($query);
			if($numrows!=0){
				while($row=mysqli_fetch_assoc($query))
				 {
					$dbusername=$row['username'];
					$dbhash=$row['hash'];
				 }
				  if($username == $dbusername && password_verify($password,$dbhash)){
					// старое место расположения
					//  session_start();
					 $_SESSION['session_username']=$username;	 
				 /* Перенаправление браузера */
				   header("Location: intropage.php");
					}
			} else {
			//  $message = "Invalid username or password!";
			
			echo  "Invalid username or password!";
		 }
		} else {
		$message = "All fields are required!";
		}
	}
?>
<!DOCKTYPE html>
<html>
<head>
	<?php
		$title = "Авторизация";
		require_once "blocks/head.php" 
	?>
</head>
<body>
	<?php require_once "blocks/header.php"?>
	<div id="wrapper">
		<div id="mlogin">
			<h1>Вход</h1>
			<form action="" id="loginform" method="post" name="loginform">
			<div>
				<label for="username">Имя пользователя<br></label>
				<input class="input" id="username" name="username"size="20"
				type="text" required>
			</div>
			<div>
				<label for="password">Пароль<br></label>
				<input class="input" id="password" name="password"size="20"
				type="password" required>
			</div> 
			<div class="submit"><input class="button" name="login"type= "submit" value="Войти">
			</div>
			<div class="regtext">Еще не зарегистрированы?<a href= "reg.php">Регистрация</a>!</div>
			  </form>
		  </div>
	</div>
	<?php require_once "blocks/footer.php"?>
</body>
</html>