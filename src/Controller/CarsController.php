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
use tavoiture\Entity\DateAvailable;

class CarsController
{

  /**
  * Prix par jour (ajax)
  *
  */
  public function priceAction(Application $app, Request $request)
  {
    $id = $request->get('id');
    $debut = $request->get('debut');
    $fin = $request->get('fin');

    $cars = new Cars();
    $price = $cars->prixNbJours($id, $debut, $fin);

    $response = new \Symfony\Component\HttpFoundation\JsonResponse();
    $response->setEncodingOptions(JSON_NUMERIC_CHECK);
    $response->setData(array('price' => $price));

    return $response;
  }


  /**
  * Liste des vehicules
  *
  */
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


  /**
  * Liste des vehicules d'un proprietaire
  *
  */
  public function myCarsAction(Application $app, Request $request)
  {
    $cars = new Cars();
    $list = $cars->findByUser(1);

    return new Response($app['twig']->render('my-cars.html.twig', array(
      'cars' => $list,
    )));
  }


  /**
  * page nouveau vehicule
  *
  */
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


    if ($request->isMethod('post')){

      // upload images
      $target_dir = __DIR__.'/../../web/images/';
      $filename = time() . basename($_FILES["fileToUpload"]["name"]);
      $target_file = $target_dir . $filename;
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 9999999) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }


      $cars = new Cars();

      if (isset($_POST['visibility']) && $_POST['visibility'] != null) {
        $visibility = 1;
      } else {
        $visibility = 0;
      }

      $cars
      ->setModelId($_POST['modele'])
      ->setUsersId(1)
      ->setHorsePower($_POST['horsePower'])
      ->setEngine($_POST['engine'])
      ->setNbPlace($_POST['nbPlace'])
      ->setEtat($_POST['etat'])
      ->setColor($_POST['color'])
      ->setPrice($_POST['price'])
      ->setAddress($_POST['address'])
      ->setCity($_POST['city'])
      ->setZipCode($_POST['zipCode'])
      ->setVisibility($visibility)
      ->setPhoto($filename)
      ->setFuelId($_POST['fuel']);

      $cars->save();

      $dates = new dateAvailable();
      $datesAvailable = $_POST['dateAvailable'];
      $dates->setCarsId($cars->getId());
      $dates->save($datesAvailable);

      return $app->redirect('/vehicule/details/' . $cars->getId());


    }

    return new Response($app['twig']->render('new-car.html.twig', array(
      'fuels' => $fuels,
      'models' => $models,
      'brands' => $brands,
      'types' => $types
    )));
  }



  /**
  * Page details du vehicule
  *
  */
  public function viewAction(Application $app, Request $request)
  {
    $id = $request->get('id');

    $cars = new Cars();
    $car = $cars->find($id);
    $date = new DateAvailable();
    $datesAvailable = $date->fetchByCar($id);

    return new Response($app['twig']->render('details-car.html.twig', array(
      'car' => $car,
      'dates' => $datesAvailable
    )));
  }

}
