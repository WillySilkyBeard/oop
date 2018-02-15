<?php 
include_once 'functions.php';
include_once 'm/messages.php';
$db = connect_db();


if(count($_POST) > 0) {
	$name = trim($_POST['name']);
	$text = trim($_POST['text']);

	if($name != '' && $text != '') {
		messages_add($db, $name, $text);

		header("Location: index.php");
		exit();
	}
} else {
	$name = '';
	$text = '';
}
include('v/v_add.php');