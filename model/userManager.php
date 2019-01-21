<?php

/**
 * Classe abstraite dont toutes les entitées ont vocation à hériter, elle contient de base un id et un hydrateur
 */
class userManager

{
  private $_db;

  public function setDb($db) {
    $this->_db = $db;
  }

  public function getDb() {
    return $this->_db;
  }
  public function getUsers() {
    $query = $this->getDb()->query('SELECT * FROM clients');
    //Si on souhaite récupérer directement des objets
    $data = $query->fetchAll(PDO::FETCH_CLASS, "client");
    //Sinon on peut utiliser fetch assoc mais il faut créer soi même les objets
    //On transforme alors chaque entrée du tableau en objet chat en l'hydratant
    // $data = $query->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($data as $key => $chat) {
    //   $data[$key] = new chat($chat);
    // }
    return $data;
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
