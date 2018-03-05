<?php
namespace Core;
use model\UserModel;
use model\SessionModel;
use core\Request;


class Users 
{
	private $mUser;
	private $mSession;

	public function __construct(UserModel $mUser, SessionModel $mSession)
	{
		$this->mUser = $mUser;
		$this->mSession = $mSession;
	}

	// регистрация
	public function signUp(array $fields)
	{
		$this->mUser->signUp($fields);
	}
	// авторизация
	public function signIn(array $fields)
	{
		$user = $this->mUser->getByLogin($fields['login']); //надо через clean на будующее
		if (!$user) {
			// throw error login not found
			echo "login not found!";
		}
		$matchPassword = $this->mUser->getHash($fields['password'], $user['password']);
		if (!$matchPassword) {
			// throw error wrong password
			echo "wrong password!";
		}

		if(isset($fields['remember'])) {
			// setCookie
		}
		// открываем обе сессии
		echo "Auth ok";
		/*echo "<pre>";
		var_dump($matchPassword);
		die;*/
	}

/*	private comparePass($fields)
	{
			// сравниваем пароли при регистрации
	}*/

//проверка на авторизацию
	/*public function isAuth(Request $recuest) {

	}*/
	// проверка на аторизованность пользователя
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
