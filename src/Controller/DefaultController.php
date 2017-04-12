<?php
namespace tavoiture\Controller;
use Silex\Application;
use Silex\ControllerProviderInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use tavoiture\Entity\Cars;


class DefaultController
{
  public function indexAction(Application $app, Request $request)
  {

    $cars = new Cars();
    $list = $cars->getLast();

    return new Response($app['twig']->render('index.html.twig', array('cars' => $list)));
  }
}