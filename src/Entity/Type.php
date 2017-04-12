<?php

namespace tavoiture\Entity;

use tavoiture\Config\Database;

class Type
{

    protected $_id;
    protected $_name;

    public function getConnexion()
    {
      $db = new Database();
      return $db->getConnexion();
    }


    public function fetchAll()
    {
      $connexion =  $this->getConnexion();
      $sql = "SELECT * FROM type";
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
