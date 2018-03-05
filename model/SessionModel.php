<?php 
namespace model;
use core\validator;

class SessionModel extends BaseModel
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
			self::$instance = new SessionModel();
		}
		return self::$instance;
	}

	public function __construct(/*Validator $validator*/) {
		parent::__construct();
		$this->table = 'sessions';
		/*$this->validator->setRules($this->schema);*/
	}

}
