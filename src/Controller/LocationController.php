<?php
namespace tavoiture\Controller;
use Silex\Application;
use Silex\ControllerProviderInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use tavoiture\Entity\Location;

class LocationController
{

  public function pendingAction(Application $app, Request $request)
  {
    $location = new Location();
    $list = $location->fetchPending();
    return new Response($app['twig']->render('location-attente.html.twig', array('locations' => $list)));
  }



  public function newAction(Application $app, Request $request)
  {

    $location = new Location();
    $location
    ->setCarsId($request->get('cars_id'))
    ->setUsersId(2)
    ->setStatusId(3)
    ->setEtat('Non effectué')
    ->setPayment(0)
    ->setDateStart(date('y-m-d', strtotime($request->get('date_start'))))
    ->setDateEnd(date('y-m-d', strtotime($request->get('date_end'))))
    ->setDate(date('y-m-d h:i'));

    $location->save();

    return $app->redirect('/vehicule/details/' . $request->get('cars_id'));

  }



  public function validAction(Application $app, Request $request)
  {

    $id = $request->get('id');
    $location = new Location();
    $location->valid($id);

    return $app->redirect('/location/en-cours');



  }


  public function refusedAction(Application $app, Request $request)
  {

    $id = $request->get('id');
    $location = new Location();
    $location->refused($id);

    return $app->redirect('/location/pending');



  }

  public function enCoursAction(Application $app, Request $request)
  {
    $location = new Location();

    return new Response($app['twig']->render('location-en-cours.html.twig', array('locations' => $location->fetchEnCours())));


  }

  public function finishedAction(Application $app, Request $request)
  {
    $location = new Location();

    return new Response($app['twig']->render('location-terminees.html.twig', array('locations' => $location->fetchFinished())));


  }


}
