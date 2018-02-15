<?php
namespace model;
use Core\SQL;
abstract class BaseModel
{
	protected $db;
	protected $table;
	protected $pk;

	public function __construct() 
	{
		$this->db = SQL::Instance();
	}
// index все статьи
	public function all() 
	{
		return $this->pdo->query("SELECT * FROM {$this->table}");
		/*//было      $sql = "SELECT * FROM {$this->table}";
		$query = $this->db->prepare($sql);
		$query->execute();

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorinfo();
			echo implode('<br>', $info);
			die();
		}

		$result = $query->fetchAll();
		return $result;*/
	}

// article отображение одной статьи
	public function one($id) 
	{
		$sql = "SELECT * FROM {$this->table} WHERE {$this->pk} = $id";
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

	// del удаление статьи
	public function delete($id) {
		$sql = "DELETE FROM {$this->table} WHERE {$this->pk} =$id";
		$query = $this->db->prepare($sql);
		$query->execute();

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorinfo();
			echo implode('<br>', $info);
			die();
		}
		return true;
	}
}