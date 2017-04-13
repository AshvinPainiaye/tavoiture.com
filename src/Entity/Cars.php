<?php

namespace tavoiture\Entity;

use tavoiture\Config\Database;
use tavoiture\Entity\Brand;
use tavoiture\Entity\Model;
use tavoiture\Entity\Fuel;

use PDO;

class Cars
{

  protected $_id;
  protected $_model_id;
  protected $_users_id;
  protected $_horse_power;
  protected $_nb_place;
  protected $_etat;
  protected $_color;
  protected $_price;
  protected $_address;
  protected $_city;
  protected $_zip_code;
  protected $_visibility;
  protected $_photo;
  protected $_fuel_id;
  protected $_engine;

  protected $connexion;

  public function __construct()
  {
    $db = new Database();
    $this->connexion =  $db->getConnexion();
  }


  public function fetchAll()
  {
    $connexion =  $this->connexion;
    $sql = "SELECT id FROM cars WHERE visibility = 1 ORDER BY id DESC";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    $return = array();
    foreach($results as $result)
    {
      $return[] = $this->find($result['id']);
    }
    return $return;
  }


  public function getLast()
  {
    $connexion =  $this->connexion;
    $sql = "SELECT * FROM cars WHERE visibility = 1 ORDER BY id DESC LIMIT 3";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function findByUser($id)
  {
    $connexion =  $this->connexion;

    $sql = "SELECT *, m.name as model, b.name as brand
    FROM cars as c
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    JOIN users as u
    ON c.users_id = u.id
    WHERE c.users_id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $id));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }



  public function find($id)
  {
    $connexion =  $this->connexion;

    $sql = "SELECT *, c.id as cars_id, m.name as model, f.name as fuel, b.name as brand
    FROM cars as c
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    JOIN fuel f
    ON c.fuel_id = f.id
    JOIN users as u
    ON c.users_id = u.id
    WHERE c.id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }



  public function save()
  {
    $connexion =  $this->connexion;

    $modelId = $this->getModelId();
    $usersId = $this->getUsersId();
    $horsePower = $this->getHorsePower();
    $engine = $this->getEngine();
    $nbPlace =$this->getNbPlace();
    $etat = $this->getEtat();
    $color = $this->getColor();
    $price =  $this->getPrice();
    $address =  $this->getAddress();
    $city = $this->getCity();
    $zipCode = $this->getZipCode();
    $visibility = $this->getVisibility();
    $photo = $this->getPhoto();
    $fuelId = $this->getFuelId();

    try {
      $sql = "INSERT INTO cars (model_id, users_id, horse_power, engine, nb_place, etat, color, price, address, city, zip_code, visibility, photo, fuel_id)"
      . " VALUES (:model_id, :users_id, :horse_power, :engine, :nb_place, :etat, :color, :price, :address, :city, :zip_code, :visibility, :photo, :fuel_id)";
      $stmt = $connexion->prepare($sql);
      $stmt->bindParam(':model_id', $modelId);
      $stmt->bindParam(':users_id', $usersId);
      $stmt->bindParam(':horse_power',$horsePower);
      $stmt->bindParam(':engine', $engine);
      $stmt->bindParam(':nb_place', $nbPlace);
      $stmt->bindParam(':etat', $etat);
      $stmt->bindParam(':color', $color);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':address', $address);
      $stmt->bindParam(':city', $city);
      $stmt->bindParam(':zip_code', $zipCode);
      $stmt->bindParam(':visibility',$visibility);
      $stmt->bindParam(':photo', $photo);
      $stmt->bindParam(':fuel_id', $fuelId);
      $stmt->execute();

      $lastId =  $connexion->lastInsertId();
      $this->setId($lastId);

    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }



  /**
  * GETTERS / SETTERS
  */
  public function getId()
  {
    return $this->_id;
  }

  public function setId($id)
  {
    $this->_id = $id;
    return $this;
  }

  public function getModelId()
  {
    return $this->_model_id;
  }

  public function setModelId($modelId)
  {
    $this->_model_id = $modelId;
    return $this;
  }

  public function getUsersId()
  {
    return $this->_users_id;
  }

  public function setUsersId($usersId)
  {
    $this->_users_id = $usersId;
    return $this;
  }

  public function getHorsePower()
  {
    return $this->_horse_power;
  }

  public function setHorsePower($horsePower)
  {
    $this->_horse_power = $horsePower;
    return $this;
  }

  public function getNbPlace()
  {
    return $this->_nb_place;
  }

  public function setNbPlace($nbPlace)
  {
    $this->_nb_place = $nbPlace;
    return $this;
  }

  public function getEtat()
  {
    return $this->_etat;
  }

  public function setEtat($etat)
  {
    $this->_etat = $etat;
    return $this;
  }

  public function getColor()
  {
    return $this->_color;
  }

  public function setColor($color)
  {
    $this->_color = $color;
    return $this;
  }

  public function getPrice()
  {
    return $this->_price;
  }

  public function setPrice($price)
  {
    $this->_price = $price;
    return $this;
  }

  public function getAddress()
  {
    return $this->_address;
  }

  public function setAddress($address)
  {
    $this->_address = $address;
    return $this;
  }

  public function getCity()
  {
    return $this->_city;
  }

  public function setCity($city)
  {
    $this->_city = $city;
    return $this;
  }

  public function getZipCode()
  {
    return $this->_zip_code;
  }

  public function setZipCode($zipCode)
  {
    $this->_zip_code = $zipCode;
    return $this;
  }

  public function getVisibility()
  {
    return $this->_visibility;
  }

  public function setVisibility($visibility)
  {
    $this->_visibility = $visibility;
    return $this;
  }

  public function getPhoto()
  {
    return $this->_photo;
  }

  public function setPhoto($photo)
  {
    $this->_photo = $photo;
    return $this;
  }

  public function getFuelId()
  {
    return $this->_fuel_id;
  }

  public function setFuelId($fuelId)
  {
    $this->_fuel_id = $fuelId;
    return $this;
  }

  public function getEngine()
  {
    return $this->_engine;
  }

  public function setEngine($engine)
  {
    $this->_engine = $engine;
    return $this;
  }



}
