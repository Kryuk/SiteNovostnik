<?php	
	$mysqli = false;
	function connectDB () {
		global $mysqli;
		$mysqli = new mysqli ("localhost", "root", "", "mysitebase");
		$mysqli->query("SET_NAMES 'utf-8'");
		if ($mysqli->connect_errno) {
			echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
		!$mysqli->query("CREATE TABLE test(id INT)") ||
		!$mysqli->query("INSERT INTO test(id) VALUES (1)")) {
		echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
		}
	}
	
	function closeDB () {
		global $mysqli;
		$mysqli->close();
	}
?>