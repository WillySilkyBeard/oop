<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 


/*echo '<pre>';
print_r($_SERVER);
echo "</pre>";*/

$info = [
	date("Y-m-d H:i:s"),
	$_SERVER['REQUEST_URI'],
	$_SERVER['HTTP_REFERER'],
	$_SERVER['REMOTE_ADDR'],
	$_SERVER['HTTP_USER_AGENT'],
];

$to_save = implode('###', $info);


/* нативный сложный метод 
=========================*/
/*$f = fopen('log.txt',  'a+');
fwrite($f, $to_save. "\n");
fclose($f);*/
/* =======================
нативный сложный метод */


/*  метод 
=========================*/
file_put_contents('log.txt', $to_save . "\n", FILE_APPEND)

/* =======================
 метод */


 ?>

 <p>страница</p>
</body>
</html>
