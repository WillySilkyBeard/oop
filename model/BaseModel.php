<?php
namespace model;
use Core\SQL;
abstract class BaseModel
{
	protected $pdo;
	protected $table;
	protected $pk;

	public function __construct() 
	{
		$this->pdo = SQL::Instance();
	}
// index все статьи
	public function all()
	{
		return $this->pdo->query("SELECT * FROM {$this->table}");
	}
// article отображение одной статьи
	public function one($id)
	{
		$article = $this->pdo->query("SELECT * FROM {$this->table} WHERE {$this->pk} = $id");

		if(!$article) {
			db_error_log($query);
			return false;
		} else {
			return $article[0];
		}
	}
// add добавить статью
	public function add($title, $content)
	{
		$params = ['title' => $title, 'content' => $content];
		$article = $this->pdo->insert($this->table, $params);
		

	if (!$article/*->errorCode() != \PDO::ERR_NONE*/) {
		$info = $article->errorinfo();
		echo implode('<br>', $info);
		die();
	}
	return true/*$db->lastInsertId()*/;
}

	public function edit_update($title, $content, $id) {
		/*$table, $object, $where*/
		$where = "id_article=$id";
		$params = ['title' => $title, 'content' => $content];
		$article = $this->pdo->update($this->table, $params, $where);

		$sql = "UPDATE articles SET title=:title, content=:content WHERE id_article=$id";
			
		return true;
	}
// показать что редактируем
	public function edit_show($title, $content, $id) {
		$article = $this->pdo->query("SELECT * FROM {$this->table} WHERE id_article=$id");
		return $article[0];
	}

// del удаление статьи
public function delete($id) {
	$where = "id_article=$id";
	$article = $this->pdo->delete($this->table, $where);
	
	return true;
}
}