<?php

class TaVoitureTest extends \PHPUnit_Framework_TestCase
{

  private $connexion = null;

  public function getConnection() {
    try {
      $this->connexion = new PDO('mysql:host=localhost;dbname=eval_location', 'root', '');
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $this->connexion;
  }


  /**
  * Récupérer les marques des vehicules
  *
  */
  function testBrandCars() {
    $connexion =  $this->getConnection();
    $sql = "SELECT * FROM brand";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $expected = array(
      array(
        'id' =>  '1',
        'name' =>  'Peugeot',
      ),
      array(
        'id' =>  '2',
        'name' =>  'Renault',
      ),    array(
        'id' =>  '3',
        'name' =>  'Citroen',
      ),    array(
        'id' =>  '4',
        'name' =>  'Ford',
      ),    array(
        'id' =>  '5',
        'name' =>  'Opel',
      ),    array(
        'id' =>  '6',
        'name' =>  'Nissan',
      ),    array(
        'id' =>  '7',
        'name' =>  'Lamborghini',
      ),    array(
        'id' =>  '8',
        'name' =>  'Ferrari',
      ),    array(
        'id' =>  '9',
        'name' =>  'Bugatti',
      ),    array(
        'id' =>  '10',
        'name' =>  'BMW',
      ),    array(
        'id' =>  '11',
        'name' =>  'Audi',
      ),    array(
        'id' =>  '12',
        'name' =>  'Toyota',
      ),
    );

    $this->assertEquals($expected, $results);
  }


  /**
  * Test le nombre de modele
  *
  */
  function testNbModel()
  {
    $connexion =  $this->getConnection();
    $sql = "SELECT count(*) FROM model";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchColumn();
    $this->assertEquals(51, $results);
  }



}
