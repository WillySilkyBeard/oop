<?php
namespace Core;

class Users 
{
//проверка на авторизацию
	public static function isAuth() {
		if(!isset($_SESSION['auth'])) {

			if ($_COOKIE['login'] == 'user' &&  $_COOKIE['password']== md5('123')) {
				$_SESSION['auth'] = true;
			} 
			else {
				return false;
			}
		}
		return true;
	}
}
