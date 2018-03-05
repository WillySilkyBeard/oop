<?php
namespace Core;

class App
{
	private $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function go()
	{
		$params = $this->getRoutByRequest();

/*		echo "<pre>";
		var_dump($params);
		die;*/

		if(!$params) {
			$params = $this->getRoutByParams('default');
		}
		$ctrl = new $params['controller']($this->request);
		$action = $params['action'];
		$ctrl->$action();
		/*$ctrl->indexAction();
*/
		$ctrl->render();
	}

	private function getRoutByParams($rout)
	{
		return isset($this->routs()[$rout]) ? $this->routs()[$rout] : false;
	}

	private function getRoutByRequest()
	{
		return isset($this->routs()[$this->request->rout]) ? $this->routs()[$this->request->rout] : false;
	}

	private function routs()
	{
		return [
			'/' => [
				'controller' => 'Controller\ArticleController',
				'action' => 'indexAction',
			],
			'/article' => [
				'controller' => 'Controller\ArticleController',
				'action' => 'oneAction',
			],
			'/add' => [
				'controller' => 'Controller\ArticleController',
				'action' => 'addAction',
			],
			'/edit' => [
				'controller' => 'Controller\ArticleController',
				'action' => 'editAction',
			],
			'/del' => [
				'controller' => 'Controller\ArticleController',
				'action' => 'deleteAction',
			],
			'/login' => [
				'controller' => 'Controller\UserController',
				'action' => 'loginAction',
			],
			'/signUp' => [
				'controller' => 'Controller\UserController',
				'action' => 'signUpAction',
			],
			'default' => [
				'controller' => 'Controller\BaseController',
				'action' => 'get404',
			]
		];
	}
}