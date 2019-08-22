<?php session_start();?>
<!DOCKTYPE html>
<html>
<head>
	<?php 
		require_once "functions/functions.php";
		$title = "Сюжеты";
		require_once "blocks/head.php";
		$news = getNews(6,"");
	?>
</head>
<body>
	<?php require_once "blocks/header.php" ?>
	<div id="wrapper">
		<?php
			for ($i=0; $i < count($news); $i++) {
				echo '<div id="bigArticle">
				 <h2>'.$news[$i]["title"].'</h2>
			<img src="img/articles/'.$news[$i]["id"].'.jpg"  alt="Статья '.$news[$i]["id"].'" title="Статья '.$news[$i]["id"].'">
			<p>'.$news[$i]["intro_text"].'</p>
			<a href="article.php?id='.$news[$i]["id"].'">
				<div class="more">Далее</div>
			</a></div>';
				echo "<div class=\"clear\"><br /></div>";
			}
		?>
	</div>
	<?php require_once "blocks/footer.php" ?>
</body>
</html>