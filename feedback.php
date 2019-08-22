<?php session_start();?>
<!DOCKTYPE html>
<html>
<head>
	<?php 
		$title = "Обратная связь";
		require_once "blocks/head.php" 
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script>
		$(document).ready (function () {
			$("#done").click (function () {
				$('messageShow').hide ();
				var name = $("#name").val ();
				var email = $("#email").val ();
				var subject = $("#subject").val ();
				var message = $("#message").val ();
				var fail = "";
				if (name.length < 3) fail = "Длина имени должна быть не менее трех символов";
				else if (email.split('@').length - 1 ==0 || email.split ('.').length - 1 == 0) 
					fail = "Введен некорректный email";
				else if (subject.length < 5) 
					fail = "Тема сообщения должна быть не менее 5 символов";
				else if (message.length < 20) 
					fail = "Длина сообщения должна быть не менее 20 символов";
				if (fail != ""){
					$('#messageShow').html (fail + "<div class='clear'><br /></div>");
					$('#messageShow').show();
					return false;
				}
				$.ajax ({
					url: '/ajax/feedback.php',
					type: 'POST',
					cache: false,
					data: {'nsme': name, 'email': email, 'subject': subject, 'message': message},
					dataType: 'html',
					success: function (data){
							$('#messageShow').html (data + "<div class='clear'><br /></div>");
							$('#messageShow').show();
					}
				});
			});
		});
	</script>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
		<input type="text" placeholder="Имя" id="name" name="name"><br />
		<input type="text" placeholder="Email" id="email" name="email"><br />
		<input type="text" placeholder="Тема" id="subject" name="subject"><br />
		<textarea name="message" id="message" placeholder="Введите ваше сообщение"></textarea><br />
		<div id="messageShow"></div>
		<input type="button" id="done" name="done" value="Отправить"><br />
	</div>
	<?php require_once "blocks/footer.php" ?>
</body>
</html>












