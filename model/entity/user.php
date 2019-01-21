<?php

/**
 * Classe abstraite dont toutes les entitées ont vocation à hériter, elle contient de base un id et un hydrateur
 */
abstract class client
{

  protected $id;
  protected $fistNAme;
  protected $lastName;
  protected $password;
  protected $address;
  protected $status;


  public function getId() {return $this->id;}
  public function getFistNAme() {return $this->fistNAme;}
  public function getLastName() {return $this->lastName;}
  public function getPassword() {return $this->password;}
  public function getAddress() {return $this->address;}
  public function getStatus() {return $this->status;}



  public function setId($id) {
    $this->id = $id;
  }

  public function setFistNAme($fistNAme) {
    $this->fistNAme = $fistNAme;
  }

  public function setLastName($lastName) {
    $this->lastName = $lastName;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function setAddress($address) {
    $this->address = $address;
  }

  public function setStatus($status) {
    $this->status = $status;
  }


  public function hydrate(array $data) {
    if(!empty($data)) {
      foreach ($data as $key => $value) {
        $method = "set" . ucfirst($key);
        if(method_exists($this, $method)) {
          $this->$method($value);
        }
      }
    }
  }
}


 ?>
