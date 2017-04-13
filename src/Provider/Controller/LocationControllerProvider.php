<?php
namespace tavoiture\Provider\Controller;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LocationControllerProvider implements ControllerProviderInterface
{
	public function connect( Application $app )
	{
		$controller = $app['controllers_factory'];
		$controller->match('/location/new', 'tavoiture\Controller\LocationController::newAction')->bind('location-new');
		$controller->match('/location/pending', 'tavoiture\Controller\LocationController::pendingAction')->bind('location-attente');
		$controller->match('/location/valid/{id}', 'tavoiture\Controller\LocationController::validAction')->bind('location-valid');
		$controller->match('/location/refused/{id}', 'tavoiture\Controller\LocationController::refusedAction')->bind('location-refused');
		$controller->match('/location/en-cours', 'tavoiture\Controller\LocationController::enCoursAction')->bind('location-en-cours');
		$controller->match('/location/terminees', 'tavoiture\Controller\LocationController::finishedAction')->bind('terminees');

		return $controller;
	}

}
