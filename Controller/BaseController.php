<?php

namespace Controller;

use Core\Users;
use Core\Tmp;
use Core\Request;

class BaseController 
{
	protected $title;
	protected $content;
	protected $auth;
	protected $request;

	public function __construct(Request $request) {
		$this->title = 'TestPageTitle';
		$this->auth = Users::isAuth();
		$this->request = $request;
	}

	public function get404() {
		$this->title = "{$this->title}::404 error";
		$this->content = "<h3>Page Not Found</h3>";
		$this->render();
		die;
	}

//базовый шаблон
	public function render() 
	{
		echo Tmp::generate('view/table.php', [
			'index' => $this->content,
			'auth' => $this->auth
		]); 
	}
}