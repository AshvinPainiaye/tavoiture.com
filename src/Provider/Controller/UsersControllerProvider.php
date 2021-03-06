<?php
namespace tavoiture\Provider\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersControllerProvider implements ControllerProviderInterface
{
	public function connect( Application $app )
	{
		$controller = $app['controllers_factory'];
		$controller->match('/account', 'tavoiture\Controller\UsersController::indexAction')->bind('account');
		$controller->match('/login', 'tavoiture\Controller\UsersController::loginAction')->bind('login');
		$controller->match('/logout', 'tavoiture\Controller\UsersController::logoutAction')->bind('logout');


		return $controller;
	}

}
