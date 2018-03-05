<?php

namespace Controller;
use model\ArticleModel;
use model\UserModel;
use model\SessionModel;
use Core\Tmp;
use Core\users;

class UserController extends BaseController
{
	protected $login;
	protected $password;
// Авторизация
	public function loginAction () {
		$errors = [];
		$this->title .= ' SingIn';

		if ($this->request->isPost()) {
			$mUser = UserModel::Instance(); 
			$mSession = SessionModel::Instance(); 
			$user = new Users($mUser, $mSession);

		$user->signIn($this->request->post);
	}

	$this->content = Tmp::generate('view/v_login.php', [
		'title' => $title,
		'content' => $content,
		'errors' => $errors
	]); 
}
//регистрация
public function signUpAction () {
	/*$data = $_POST;*/
	$this->title .= ' SingUp';

	if ($this->request->isPost()) {
		$mUser = UserModel::Instance(); 
		$mSession = SessionModel::Instance(); 
		$user = new Users($mUser, $mSession);
		/*$title = $mUser->clean($data['login']);
		$content = $mUser->clean($data['password']);*/

		$user->signUp($this->request->post);
	}

		/*$data = $_POST;

		if (count($data) > 0) {

			if ($_POST['login'] == 'user' && $_POST['password'] == '123') {
				$_SESSION['auth'] = true;
				 
				if (isset($data['remember'])) {
					setcookie('login', 'user', time() + 3600);
					setcookie('password', md5('123'), time() + 3600);
				}
				header('Location: /');
				exit();
			} 
		}
		else {
			unset($_SESSION['auth']);
			setcookie('login', 'user', time() - 3600 * 24 * 7);
			setcookie('password', '123', time() - 3600 * 24 * 7);
		}*/

		$this->content = Tmp::generate('view/v_signUp.php', [
			'title' => $title,
			'content' => $content,
			'errors' => $errors
		]); 
	}
}