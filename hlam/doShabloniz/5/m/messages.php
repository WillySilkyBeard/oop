<?php 
//
function messages_all($db) {
	$sql = "SELECT * FROM comments2 ORDER BY dt DESC";
	$query = $db->prepare($sql);
	$query->execute();

	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		exit();
	}

	$result = $query->fetchAll();
	return $result;
}
//
function messages_add($db, $name, $text) {
	$sql = "INSERT INTO comments2 (name, text) VALUES ('$name', '$text')";
	$query = $db->prepare($sql);
	$query->execute();

	if ($query->errorCode() != PDO::ERR_NONE) {
		$info = $query->errorinfo();
		echo implode('<br>', $info);
		exit();
	}
	return $db->lastInsertId();
}
