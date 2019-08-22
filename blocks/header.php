<!DOCKTYPE html>
<header>
		<div id="logo">
			<a href="/" title="Перейти на главную">Новостник</a>
		</div>
		<div id="menuHead">
			<a href="/chronicles.php">
				<div style="margin-right: 3%">Сюжеты</div>
			</a>
			<a href="/podcasts.php">
				<div style="margin-right: 3%">Подкасты</div>
			</a>
			<a href="/about.php">
				<div>О нас</div>
			</a>
		</div>
		<?php if(!isset($_SESSION['session_username'])):?>
		<div id="regAuth">
			<a href="/reg.php">Регистрация</a> | <a href="/auth.php">Авторизация</a>
		</div>
		<?else:?>
			<div id="regAuth">
			<a href="/intropage.php">Профиль</a> | <a href="/logout.php">Выйти</a>
			</div>
		<?endif;?>
</header>