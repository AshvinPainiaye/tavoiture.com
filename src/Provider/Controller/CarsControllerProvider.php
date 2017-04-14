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
		$controller->match('/vehicules', 'tavoiture\Controller\CarsController::indexAction')->bind('list-car');
		$controller->match('/vehicule/new', 'tavoiture\Controller\CarsController::NewAction')->bind('new-car');
		$controller->match('/vehicule/add', 'tavoiture\Controller\CarsController::AddAction')->bind('add-car');
		$controller->match('/vehicule/details/{id}', 'tavoiture\Controller\CarsController::viewAction')->bind('details-car');
		$controller->match('/mes-vehicules', 'tavoiture\Controller\CarsController::myCarsAction')->bind('my-cars');
		$controller->match('/vehicule/prix/{id}', 'tavoiture\Controller\CarsController::priceAction')->bind('price');


		return $controller;
	}

}
