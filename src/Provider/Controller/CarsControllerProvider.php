<?php
namespace tavoiture\Provider\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CarsControllerProvider implements ControllerProviderInterface
{
	public function connect( Application $app )
	{
		$controller = $app['controllers_factory'];
		$controller->match('/vehicule', 'tavoiture\Controller\CarsController::indexAction')->bind('list-car');
		$controller->match('/vehicule/new', 'tavoiture\Controller\CarsController::NewAction')->bind('new-car');
		$controller->match('/vehicule/add', 'tavoiture\Controller\CarsController::AddAction')->bind('add-car');

		return $controller;
	}

}
