<?php
namespace tavoiture\Provider\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultControllerProvider implements ControllerProviderInterface
{
	public function connect( Application $app )
	{
		$controller = $app['controllers_factory'];
		$controller->match('/', 'tavoiture\Controller\DefaultController::indexAction')->bind('homepage');
		return $controller;
	}

}
