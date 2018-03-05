<?php

namespace Controller;

use model\ArticleModel;
use Core\Tmp;
use Core\users;

class ArticleController extends BaseController
{
	protected $content;
	protected $auth;

	public function indexAction() 
	{
		$mArticle = ArticleModel::Instance(); 
		$counter = 1;
		$items = $mArticle->all();

		if($items === false) {
			echo "Ошибка";
		}
		elseif ($items == []) {
			echo "Нет материалов для показа";
		}
		//внутренний шаблон
		$this->content = Tmp::generate('view/v_index.php', [
			'comments' => $items,
			'counter' => $counter
		]); 
	}

	public function oneAction() 
	{
		if(!isset($this->request->get['id'])) {
			$this->get404();
		}
		$article = ArticleModel::Instance()->one($this->request->get['id']); 

		if(!$article) {
			$this->get404();
		}

		$this->title .= " ".$article['title'];
		$this->content = Tmp::generate('view/v_article.php', [
			'id' => $this->request->get['id'],
			'title' => $article['title'],
			'content' => $article['content'],
			'dt' => $article['dt'],
			'auth' => $this->auth
		]); 
	}
	public function addAction() {
		$data = $_POST;
		$mArticle = ArticleModel::Instance();
		if(count($_POST) > 0) {
// POST
			$title = $mArticle->clean($data['title']);
			$content = $mArticle->clean($data['content']);

			$errors = $mArticle->validate($title, $content);

			if(empty($errors)) {
				$mArticle->add($title, $content);
				header("Location: /");
				exit();
			}  
		}else {
//GET
			$title = '';
			$content = '';
			$errors = [];
		}
		$this->title .= ' Добавление..';
		$this->content = Tmp::generate('view/v_add.php', [
			'title' => $title,
			'content' => $content,
			'errors' => $errors
		]); 
	}
	public function editAction() {
		$mArticle = ArticleModel::Instance();
		$auth = users::isAuth();

		//проверка авторизации
		if(!$auth) {
			header("Location: /login");
			exit();
		}

		if (count($_POST) > 0 ) {
//когда нажали кнопку сохранить появился пост
			$id = $this->request->get['id'];
			$title = $mArticle->clean($_POST['title']);
			$content = $mArticle->clean($_POST['content']);
			$errors = $mArticle->validate($title, $content);

			if(empty($errors)) {
				$mArticle->edit_update($title, $content, $id);
				header("Location: /");
				exit();
			}
			$this->title .= ' Редактирование..';
			$this->content = Tmp::generate('view/v_edit.php', [
				'id' => $this->request->get['id'],
				'title' => $title,
				'content' => $content,
				'auth' => $this->auth,
				'errors' => $errors
			]); 
		} else {
			// зашли по ссылке поста еще нет
			$id = $this->request->get['id'];

			$article = $mArticle->edit_show($title, $content, $id);

			$title = $article['title'];
			$content = $article['content'];
			$errors = [];

			$this->content = Tmp::generate('view/v_edit.php', [
				'id' => $this->request->get['id'],
				'title' => $title,
				'content' => $content,
				'auth' => $this->auth,
				'errors' => $errors
			]); 
		}
	}

	public function deleteAction() {
		$mArticle = ArticleModel::Instance();
		$auth = users::isAuth();
		if(!$auth) {
			header('Location: /login');
			exit();
		}

		$id = $this->request->get['id'];

		if(isset($id)) {

			$mArticle->delete($id);

			header('Location: /');
			exit();
		}
	}
	
}