<?php
	session_start();
	require_once "functions/connect.php";
	if(isset($_SESSION['session_username'])){
	header("Location: intropage.php");
	 exit;
	}
	global $mysqli;
	connectDB();
	if(isset($_POST["register"])){
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$full_name= htmlspecialchars($_POST['full_name']);
		$email=htmlspecialchars($_POST['email']);
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $mysqli->prepare("SELECT * FROM userlist WHERE username=?");
		if($stmt->execute($_POST['username'])){
			$numrows=mysqli_num_rows($query);
		}
		if($numrows==0)
		   {
			$stmt = $mysqli->prepare("INSERT INTO userlist
			(full_name, email, username,hash) VALUES(?, ?, ?, ?)");
			$stmt->bind_param("ssss", $full_name, $email, $username, $hash);
			if($stmt->execute()){
				$message = "Account Successfully Created";
			} else {
				$message = "Failed to insert data information!";
				}
		} else {
			$message = "That username already exists! Please try another one!";
			}
	} else {
		$message = "All fields are required!";
		}
	closeDB();
	}
?>
<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";}?>
<!DOCKTYPE html>
<html>
<head>
	<?php 
		$title = "Регистрация";
		require_once "blocks/head.php" 
	?>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
		<div id="mlogin">
			<h1>Регистрация</h1>
			<form action="reg.php" id="registerform" method="post" name="registerform">
				 <div>
					<label for="full_name">Полное имя<br></label>
					<input class="input" id="full_name" name="full_name"size="32"  type="text" required>
				</div>
				<div>
					<label for="email">E-mail<br></label>
					<input class="input" id="email" name="email" size="32"type="email" required>
				</div>
				<div>
					<label for="username">Имя пользователя<br></label>
					<input class="input" id="username" name="username"size="20" type="text" required>
				</div>
				<div>
					<label for="password">Пароль<br></label>	
					<input class="input" id="password" name="password"size="32"   type="password" required>
				</div>
				<div class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></div>
				<div class="regtext">Уже зарегистрированы? <a href= "auth.php">Введите имя пользователя</a>!</div>
			</form>
		</div>
	</div>
	<?php require_once "blocks/footer.php" ?>
</body>
</html>