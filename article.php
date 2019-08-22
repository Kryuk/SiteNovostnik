<!DOCKTYPE html>
<html>
<head>
	<?php 
		require_once "functions/functions.php";
		$news = getNews(1, $_GET["id"]);
		$title = $news["title"];
		require_once "blocks/head.php";
	?>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
		<?php
		echo  '<div id="bigArticle"><h2>'.$news["title"].'</h2>
			<img src="/img/articles/'.$news["id"].'.jpg"  alt="Статья '.$news["id"].'" title="Статья '.$news["id"].'">
			<p>'.$news["intro_text"]."<br>".$news["full_text"].'</p>
			</div>';
		?>
	</div>
	<?php require_once "blocks/footer.php" ?>
</body>
</html>