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


  public function getId() {return $this->id;}
  public function getFistNAme() {return $this->fistNAme;}
  public function getLastName() {return $this->lastName;}
  public function getPassword() {return $this->password;}
  public function getAddress() {return $this->address;}


  public function setId($id) {
    $this->id = $id;
  }

  public function setId($fistNAme) {
    $this->fistNAme = $fistNAme;
  }

  public function setId($lastName) {
    $this->lastName = $lastName;
  }

  public function setId($password) {
    $this->password = $password;
  }

  public function setId($address) {
    $this->address = $address;
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
