<?php

namespace tavoiture\Entity;

use tavoiture\Config\Database;

class Model
{

  protected $_id;
  protected $_type_id;
  protected $_brand_id;
  protected $_name;

  protected $connexion;

  public function __construct()
  {
    $db = new Database();
    $this->connexion =  $db->getConnexion();
  }


  public function fetchAll()
  {
    $connexion =  $this->connexion;
    $sql = "SELECT * FROM model";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
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

  public function getTypeId()
  {
    return $this->_type_id;
  }

  public function setTypeId($typeId)
  {
    $this->_type_id = $typeId;
    return $this;
  }

  public function getBrandId()
  {
    return $this->_brand_id;
  }

  public function setBrandId($brandId)
  {
    $this->_brand_id = $brandId;
    return $this;
  }

  public function getName()
  {
    return $this->_name;
  }

  public function setName($name)
  {
    $this->_name = $name;
    return $this;
  }



}
