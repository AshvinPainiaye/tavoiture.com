<?php
namespace tavoiture\Controller;
use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use tavoiture\Entity\Location;

class LocationController
{

  /**
  * Nouvelle Locations
  *
  */
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


  /**
  * Le proprietaire accepte la location
  *
  */
  public function proprietaireValidAction(Application $app, Request $request)
  {
    $id = $request->get('id');
    $location = new Location();
    $location->valid($id);

    return $app->redirect('/location/en-cours');
  }

  /**
  * Le proprietaire refuse la Locations
  *
  */
  public function proprietaireRefusedAction(Application $app, Request $request)
  {
    $id = $request->get('id');
    $location = new Location();
    $location->refused($id);

    return $app->redirect('/location/pending');
  }


  /**
  * Locations en attente (page proprietaire)
  *
  */
  public function proprietairePendingAction(Application $app, Request $request)
  {
    $location = new Location();
    $list = $location->fetchLocationPending(1);

    return new Response($app['twig']->render('location-attente.html.twig', array('locations' => $list)));
  }


  /**
  * Locations en cours (page proprietaire)
  *
  */
  public function proprietaireEnCoursAction(Application $app, Request $request)
  {
    $location = new Location();

    return new Response($app['twig']->render('location-en-cours.html.twig', array('locations' => $location->fetchLocationEnCours(1))));
  }


  /**
  * Locations terminées (page proprietaire)
  *
  */
  public function proprietaireFinishedAction(Application $app, Request $request)
  {
    $location = new Location();

    return new Response($app['twig']->render('location-terminees.html.twig', array('locations' => $location->fetchLocationFinished(1))));
  }


  /**
  * Locations en attente (page locataire)
  *
  */
  public function locatairePendingAction(Application $app, Request $request)
  {
    $location = new Location();
    $list = $location->fetchReservationPending(2);
    return new Response($app['twig']->render('reservation-attente.html.twig', array('locations' => $list)));
  }


  /**
  * Locations en cours (page locataire)
  *
  */
  public function locataireEnCoursAction(Application $app, Request $request)
  {
    $location = new Location();

    return new Response($app['twig']->render('reservation-en-cours.html.twig', array('locations' => $location->fetchReservationEnCours(2))));
  }


  /**
  * Locations terminées (page locataire)
  *
  */
  public function locataireFinishedAction(Application $app, Request $request)
  {
    $location = new Location();

    return new Response($app['twig']->render('reservation-terminees.html.twig', array('locations' => $location->fetchReservationFinished(2))));
  }

}
