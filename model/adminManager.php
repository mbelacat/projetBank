<?php

/**
 * Classe abstraite dont toutes les entitées ont vocation à hériter, elle contient de base un id et un hydrateur
 */
class adminManager

{
  private $_db;

  public function setDb($db) {
    $this->_db = $db;
  }

  public function getDb() {
    return $this->_db;
  }

  

  public function delete(int $id){
    $query = $this->getDb()->prepare("DELETE FROM client WHERE id = ?");
    $result = $query->execute([$id]);
    return $result;
  }

  function __construct()
  {
    $this->setDb(dataBase::BD());
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
