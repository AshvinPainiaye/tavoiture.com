<?php
namespace tavoiture\Config;

use PDO;
use PDOException;


class Database{

  private $connexion = null;

  public function getConnexion(){

    try {
      $this->connexion = new PDO('mysql:host=localhost;dbname=eval_location', 'root' ,'');
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    return $this->connexion;
  }

}
