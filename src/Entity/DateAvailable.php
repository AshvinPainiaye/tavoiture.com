<?php

namespace tavoiture\Entity;

use tavoiture\Config\Database;


class DateAvailable
{

  protected $_id;
  protected $_cars_id;
  protected $_date;

  protected $connexion;

  public function __construct()
  {
    $db = new Database();
    $this->connexion =  $db->getConnexion();
  }


  public function fetchByCar($id)
  {
    $connexion =  $this->connexion;
    $sql = "SELECT * FROM date_available WHERE cars_id = $id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }



  public function save($dates)
  {
    $connexion =  $this->connexion;

    $datesArray = explode(",", $dates);

    $carsId = $this->getCarsId();


    foreach($datesArray as $date)
    {

      try {
        $sql = "INSERT INTO date_available (cars_id, `date`)"
        . " VALUES (:cars_id, :date)";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':cars_id', $carsId);
        $stmt->bindParam(':date', date('Y-m-d', strtotime($date)));
        $stmt->execute();


      } catch (Exception $e) {
        echo $e->getMessage();
      }

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

  public function getCarsId()
  {
    return $this->_cars_id;
  }

  public function setCarsId($carsId)
  {
    $this->_cars_id = $carsId;
    return $this;
  }

  public function getDate()
  {
    return $this->_date;
  }

  public function setDate($date)
  {
    $this->_date = $date;
    return $this;
  }



}
