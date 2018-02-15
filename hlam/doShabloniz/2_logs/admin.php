<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
<?php 

//$str = file_get_contents('log.txt');
$arr = file('log.txt');
//$arr = explode("\n", $str);

echo "<table>";
foreach ($arr as $string) {
	echo "<tr>";
	$info = explode('###', $string);

foreach ($info as $elem) {
	echo "<td>$elem</td>";
	# code...
}

	echo "</tr>";
}
echo "</table>";

 ?>

 <p>страница</p>
</body>
</html>
