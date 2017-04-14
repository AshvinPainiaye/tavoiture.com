<?php

namespace tavoiture\Entity;

use tavoiture\Config\Database;

use PDO;


class Users
{

  protected $_id;
  protected $_firstname;
  protected $_lastname;
  protected $_password;
  protected $_sex;
  protected $_mail;
  protected $_birthday;

  protected $connexion;

  public function __construct()
  {
    $db = new Database();
    $this->connexion =  $db->getConnexion();
  }

  public function authenticate($email, $password)
  {
    $connexion =  $this->connexion;

    $pass = sha1($password);

    $sql = "SELECT * FROM users WHERE mail = :email AND password = :pass";
    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':pass' => $pass, ':email' => $email));

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result != null) {
      return $result;
    }
    return false;
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

  public function getFirstname()
  {
    return $this->_firstname;
  }

  public function setFirstname($firstname)
  {
    $this->_firstname = $firstname;
    return $this;
  }

  public function getLastname()
  {
    return $this->_lastname;
  }

  public function setLastname($lastname)
  {
    $this->_lastname = $lastname;
    return $this;
  }

  public function getPassword()
  {
    return $this->_password;
  }

  public function setPassword($password)
  {
    $this->_password = $password;
    return $this;
  }

  public function getSex()
  {
    return $this->_sex;
  }

  public function setSex($sex)
  {
    $this->_sex = $sex;
    return $this;
  }

  public function getMail()
  {
    return $this->_mail;
  }

  public function setMail($mail)
  {
    $this->_mail = $mail;
    return $this;
  }

  public function getBirthday()
  {
    return $this->_birthday;
  }

  public function setBirthday($birthday)
  {
    $this->_birthday = $birthday;
    return $this;
  }



}
