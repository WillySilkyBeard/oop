<?php 
namespace model;
use core\validator;
use core\User;
/*include_once "BaseModel.php";*/


class UserModel extends BaseModel
{
	
	public static $instance;

	protected $schema = [
		'id' => [
			'primary' => true
		],
		'login' => [
			'type' => 'string',
			'length' => [3, 50],
			'not_blank' => true,
			'require' => true
		],
		'password' => [
			'type' => 'string',
			'length' => [3, 50],
			'not_blank' => true,
			'require' => true
		],
	];

	public static function Instance() {
		if(self::$instance == null){
			self::$instance = new UserModel();
		}
		return self::$instance;
	}

public function __construct(/*Validator $validator*/) {
	parent::__construct();
	$this->table = 'users';
	/*$this->validator->setRules($this->schema);*/
}

public function signUp(array $fields) {
	$this->addUser([
			'login' => $fields['login'],
			'password' => $this->setHash($fields['password'])
		]);
}
/*public function signIn($fields) {

	$this->findUser($fields);
}*/

public function getByLogin($login) {
	$sql = "SELECT * FROM {$this->table} WHERE login = '$login'";
	return $this->pdo->queryOne($sql);
}

public function setHash($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}

public function getHash(string $password, string $hash)
{
	return password_verify($password, $hash);
}


//функция для очистки полей от пробелов, спец.символов и php/html тегов
function clean($var = "") {  
	$var = trim($var);
	$var = htmlspecialchars($var);
	return $var;
}

/*// проверка валидации
	public function validateUser($title, $content) {
		$errors = [];

		if($title == '') {
			$errors[] = 'Все поля должны быть заполнены!';
		}
		elseif(strlen($title) < 3) {
			$errors[] = 'Название не должно быть короче 3 символов!';
		}
		elseif(strlen($title) > 10) {
			$errors[] = 'Название не должно быть длинее 10 символов!';
		}
		if($content == '') {
			$errors[] = 'Контент пустой!';
		}
		return $errors;
	}*/
}
