<?php

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
