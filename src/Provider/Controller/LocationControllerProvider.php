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
		$controller->match('/location/pending', 'tavoiture\Controller\LocationController::proprietairePendingAction')->bind('location-attente');
		$controller->match('/location/valid/{id}', 'tavoiture\Controller\LocationController::proprietaireValidAction')->bind('location-valid');
		$controller->match('/location/refused/{id}', 'tavoiture\Controller\LocationController::proprietaireRefusedAction')->bind('location-refused');
		$controller->match('/location/en-cours', 'tavoiture\Controller\LocationController::proprietaireEnCoursAction')->bind('location-en-cours');
		$controller->match('/location/terminees', 'tavoiture\Controller\LocationController::proprietaireFinishedAction')->bind('location-terminees');
		$controller->match('/reservation/pending', 'tavoiture\Controller\LocationController::locatairePendingAction')->bind('reservation-attente');
		$controller->match('/reservation/en-cours', 'tavoiture\Controller\LocationController::locataireEnCoursAction')->bind('reservation-en-cours');
		$controller->match('/reservation/terminees', 'tavoiture\Controller\LocationController::locataireFinishedAction')->bind('reservation-terminees');

		return $controller;
	}

}
