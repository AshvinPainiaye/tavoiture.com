<?php
namespace tavoiture\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use tavoiture\Entity\Cars;
use tavoiture\Entity\Fuel;
use tavoiture\Entity\Model;
use tavoiture\Entity\Brand;
use tavoiture\Entity\Type;

class CarsController
{


  public function indexAction(Application $app, Request $request)
  {
    $cars = new Cars();
    $list = $cars->fetchAll();


    $fuel = new Fuel();
    $fuels = $fuel->fetchAll();

    $model = new Model();
    $models = $model->fetchAll();

    $brand = new Brand();
    $brands = $brand->fetchAll();

    $type = new Type();
    $types = $type->fetchAll();


    return new Response($app['twig']->render('list-car.html.twig', array(
      'cars' => $list,
      'fuels' => $fuels,
      'models' => $models,
      'brands' => $brands,
      'types' => $types

    )));
  }



  public function newAction(Application $app, Request $request)
  {

    $fuel = new Fuel();
    $fuels = $fuel->fetchAll();

    $model = new Model();
    $models = $model->fetchAll();

    $brand = new Brand();
    $brands = $brand->fetchAll();

    $type = new Type();
    $types = $type->fetchAll();

    return new Response($app['twig']->render('new-car.html.twig', array(
      'fuels' => $fuels,
      'models' => $models,
      'brands' => $brands,
      'types' => $types
    )));
  }



  public function addAction(Application $app, Request $request)
  {
    $cars = new Cars();

    $cars
    ->setModelId($request->get('modele'))
    ->setUsersId(1)
    ->setHorsePower($request->get('horsePower'))
    ->setEngine($request->get('engine'))
    ->setNbPlace($request->get('nbPlace'))
    ->setEtat($request->get('etat'))
    ->setColor($request->get('color'))
    ->setPrice($request->get('price'))
    ->setAddress($request->get('address'))
    ->setCity($request->get('city'))
    ->setZipCode($request->get('zipCode'))
    ->setVisibility($request->get('visibility'))
    ->setPhoto($request->get('photo'))
    ->setFuelId($request->get('fuel'));

    $cars->save();

    return $app->redirect('/vehicule/new');

  }



  public function viewAction(Application $app, Request $request)
  {

    $id = $request->get('id');

    $cars = new Cars();
    $car = $cars->findBy($id);

    return new Response($app['twig']->render('details-car.html.twig', array('car' => $car)));
  }





}
