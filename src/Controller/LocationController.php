<?php
namespace tavoiture\Controller;
use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use tavoiture\Entity\Location;
use tavoiture\Entity\Cars;

class LocationController
{

  /**
  * Nouvelle Locations
  *
  */
  public function newAction(Application $app, Request $request)
  {

    $user = $app['session']->get('user');


    $cars = new Cars();
    $car = $cars->find($_POST['cars_id']);
    if (isset($_POST['lieu_different']) && $_POST['lieu_different'] != null) {
      $address = $_POST['address'];
      $city = $_POST['city'];
      $zipCode = $_POST['zipcode'];
    } else {
      $address = $car['address'];
      $city = $car['city'];
      $zipCode = $car['zip_code'];
    }

    $location = new Location();
    $location
    ->setCarsId($_POST['cars_id'])
    ->setPrice($_POST['price'])
    ->setUsersId($user['id'])
    ->setStatusId(3)
    ->setEtat('Non effectué')
    ->setPayment(0)
    ->setDateStart(date('y-m-d', strtotime($_POST['date_start'])))
    ->setDateEnd(date('y-m-d', strtotime($_POST['date_end'])))
    ->setDate(date('y-m-d h:i'))
    ->setAddress($address)
    ->setCity($city)
    ->setZipCode($zipCode);
    $location->save();

    return $app->redirect('/vehicule/details/' . $_POST['cars_id']);

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
    $user = $app['session']->get('user');

    $location = new Location();
    $list = $location->fetchLocationPending($user['id']);

    return new Response($app['twig']->render('location-attente.html.twig', array('locations' => $list)));
  }


  /**
  * Locations en cours (page proprietaire)
  *
  */
  public function proprietaireEnCoursAction(Application $app, Request $request)
  {
    $location = new Location();
    $user = $app['session']->get('user');

    return new Response($app['twig']->render('location-en-cours.html.twig', array('locations' => $location->fetchLocationEnCours($user['id']))));
  }


  /**
  * Locations terminées (page proprietaire)
  *
  */
  public function proprietaireFinishedAction(Application $app, Request $request)
  {
    $location = new Location();
    $user = $app['session']->get('user');

    return new Response($app['twig']->render('location-terminees.html.twig', array('locations' => $location->fetchLocationFinished($user['id']))));
  }


  /**
  * Locations en attente (page locataire)
  *
  */
  public function locatairePendingAction(Application $app, Request $request)
  {
    $location = new Location();
    $user = $app['session']->get('user');

    $list = $location->fetchReservationPending($user['id']);
    return new Response($app['twig']->render('reservation-attente.html.twig', array('locations' => $list)));
  }


  /**
  * Locations en cours (page locataire)
  *
  */
  public function locataireEnCoursAction(Application $app, Request $request)
  {
    $location = new Location();
    $user = $app['session']->get('user');

    return new Response($app['twig']->render('reservation-en-cours.html.twig', array('locations' => $location->fetchReservationEnCours($user['id']))));
  }


  /**
  * Locations terminées (page locataire)
  *
  */
  public function locataireFinishedAction(Application $app, Request $request)
  {
    $location = new Location();
    $user = $app['session']->get('user');

    return new Response($app['twig']->render('reservation-terminees.html.twig', array('locations' => $location->fetchReservationFinished($user['id']))));
  }

}
