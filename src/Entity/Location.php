<?php

namespace tavoiture\Entity;

use tavoiture\Config\Database;

use PDO;


class Location
{
  protected $_id;
  protected $_cars_id;
  protected $_users_id;
  protected $_status_id;
  protected $_etat;
  protected $_payment;
  protected $_date_start;
  protected $_date_end;
  protected $_date;
  protected $connexion;


  public function __construct()
  {
    $db = new Database();
    $this->connexion =  $db->getConnexion();
  }


  public function save()
  {
    $connexion =  $this->connexion;
    $carsId = $this->getCarsId();
    $usersId = $this->getUsersId();
    $statusId = $this->getStatusId();
    $etat = $this->getEtat();
    $payment = $this->getPayment();
    $dateStart = $this->getDateStart();
    $dateEnd = $this->getDateEnd();
    $date =  $this->getDate();

    try {
      $sql = "INSERT INTO location (cars_id, users_id, status_id,	etat,	payment, date_start, date_end, `date`)"
      . "VALUES (:cars_id, :users_id, :status_id,	:etat,	:payment, :date_start, :date_end, :date)";
      $stmt = $connexion->prepare($sql);
      $stmt->bindParam(':cars_id', $carsId);
      $stmt->bindParam(':users_id', $usersId);
      $stmt->bindParam(':status_id',$statusId);
      $stmt->bindParam(':etat', $etat);
      $stmt->bindParam(':payment', $payment);
      $stmt->bindParam(':date_start', $dateStart);
      $stmt->bindParam(':date_end', $dateEnd);
      $stmt->bindParam(':date', $date);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }


  public function fetchLocationPending($userId)
  {
    $connexion =  $this->connexion;
    $today = date('Y-m-d');
    $sql = "SELECT *, l.id as location, m.id as model_id, m.name as model, b.id as brand_id, b.name as brand
    FROM location as l
    JOIN cars c
    ON l.cars_id = c.id
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    WHERE l.status_id = 3 AND date_end > :today AND c.users_id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $userId, ':today' => $today));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function fetchLocationFinished($usersId)
  {
    $connexion =  $this->connexion;
    $today = date('Y-m-d');

    $sql = "SELECT *, m.name as model, b.name as brand
    FROM location as l
    JOIN cars c
    ON l.cars_id = c.id
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    WHERE l.status_id != 4 AND l.status_id != 3 AND date_end < :today AND c.users_id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $usersId, ':today' => $today));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function fetchLocationEnCours($usersId)
  {
    $connexion =  $this->connexion;
    $today = date('Y-m-d');

    $sql = "SELECT *, m.name as model, b.name as brand
    FROM location as l
    JOIN cars c
    ON l.cars_id = c.id
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    WHERE l.status_id = 1 AND date_end > :today AND c.users_id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $usersId, ':today' => $today));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function fetchReservationPending($usersId)
  {
    $connexion =  $this->connexion;
    $today = date('Y-m-d');

    $sql = "SELECT *, l.id as location, m.id as model_id, m.name as model, b.id as brand_id, b.name as brand
    FROM location as l
    JOIN cars c
    ON l.cars_id = c.id
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    WHERE l.status_id = 3 AND date_end > :today AND l.users_id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $usersId, ':today' => $today));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function fetchReservationEnCours($usersId)
  {
    $connexion =  $this->connexion;
    $today = date('Y-m-d');
    $sql = "SELECT *, m.name as model, b.name as brand
    FROM location as l
    JOIN cars c
    ON l.cars_id = c.id
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    WHERE l.status_id = 1 AND date_end > :today AND l.users_id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $usersId, ':today' => $today));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  

  public function fetchReservationFinished($usersId)
  {
    $connexion =  $this->connexion;
    $today = date('Y-m-d');

    $sql = "SELECT *, m.name as model, b.name as brand
    FROM location as l
    JOIN cars c
    ON l.cars_id = c.id
    JOIN model m
    ON c.model_id = m.id
    JOIN brand b
    ON m.brand_id = b.id
    WHERE l.status_id != 4 AND l.status_id != 3 AND date_end < :today AND l.users_id = :id";

    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':id' => $usersId, ':today' => $today));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function valid($id)
  {
    $connexion =  $this->connexion;
    $sql = "UPDATE location SET status_id = 1 WHERE `location`.`id` = $id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
  }


  public function refused($id)
  {
    $connexion =  $this->connexion;
    $sql = "UPDATE location SET status_id = 4 WHERE `location`.`id` = $id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
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

  public function getUsersId()
  {
    return $this->_users_id;
  }

  public function setUsersId($usersId)
  {
    $this->_users_id = $usersId;
    return $this;
  }

  public function getStatusId()
  {
    return $this->_status_id;
  }

  public function setStatusId($statusId)
  {
    $this->_status_id = $statusId;
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

  public function getPayment()
  {
    return $this->_payment;
  }

  public function setPayment($payment)
  {
    $this->_payment = $payment;
    return $this;
  }

  public function getDateStart()
  {
    return $this->_date_start;
  }

  public function setDateStart($dateStart)
  {
    $this->_date_start = $dateStart;
    return $this;
  }

  public function getDateEnd()
  {
    return $this->_date_end;
  }

  public function setDateEnd($dateEnd)
  {
    $this->_date_end = $dateEnd;
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
