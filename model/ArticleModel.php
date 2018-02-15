<?php 
namespace model;
include_once "BaseModel.php";
/*include_once "DB.php";*/


class ArticleModel extends BaseModel
{
	public static $instance;

	public static function Instance() {
		if(self::$instance == null){
			self::$instance = new ArticleModel();
		}
		return self::$instance;
	}

	public function __construct() {

		parent::__construct();

		$this->table = 'articles';
		$this->pk = 'id_article';
	}

/*// шаблон
	function template($path, $vars= []) {
		ob_start();
		extract($vars);
		include($path);
		$res = ob_get_clean();
		return $res;
	}*/

//функция для очистки полей от пробелов, спец.символов и php/html тегов
	function clean($var = "") {  
		$var = trim($var);
		$var = htmlspecialchars($var);
		return $var;
	}

// проверка валидации
	public function validate($title, $content) {
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
	}


// edit GET редактировать статью
	public function edit_show($title, $content, $id) {
		$sql = "SELECT * FROM articles WHERE id_article=$id";
		$query = $this->db->prepare($sql);
		$query->execute();

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorinfo();
			echo implode('<br>', $info);
			die();
		}
		$article = $query->fetch();
		return $article;
	}
// add добавить статью
	public function add($title, $content) {
		$sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";
		$query = $this->db->prepare($sql);

		$params = ['title' => $title, 'content' => $content];
		$query->execute($params);

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorinfo();
			echo implode('<br>', $info);
			die();
		}
		return true/*$db->lastInsertId()*/;
	}
// edit изменить статью
	public function edit_update($title, $content, $id) {
		$sql = "UPDATE articles SET title=:title, content=:content WHERE id_article=$id"; 
		$query = $this->db->prepare($sql);
		$params = ['title' => $title, 'content' => $content];
		$query->execute($params);

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorinfo();
			echo implode('<br>', $info);
			die();
		}
		return true;
	}

}
