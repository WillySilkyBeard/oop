<?php
namespace Core;

class PDO
{
	private static $db;

	public static function Instance()
	{
		if(self::$db == null){
			self::$db = self::getConnect();
		}
		return self::$db;
	}

	//функция для подключения базе данных
	private static function getConnect()
	{
		$db = new \PDO('mysql:host=localhost; dbname=php1', 'root', '');
		$db->exec("SET NAMES UTF8");
		return $db;
	}
}


