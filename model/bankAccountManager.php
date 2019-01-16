<?php

/**
 * Classe abstraite dont toutes les entitées ont vocation à hériter, elle contient de base un id et un hydrateur
 */
class bankAccountManager

{
  private $_db;

  public function setDb($connection) {
    $this->_db = $connection;
  }

  public function getDb() {
    return $this->_db;
  }

  public function getAccount() {
    $query = $this->getDb()->query('SELECT * FROM bankAccount');
    //Si on souhaite récupérer directement des objets
    $data = $query->fetchAll(PDO::FETCH_CLASS, "bankAccount");

    return $data;
  }



  //Fonction pour ajouter un compte, elle attend explicitement un objet chat et non pas un tableau
  public function addAccount(bankAccount $bankAccount) {
    $query = $this->getDb()->prepare("INSERT INTO bankAccount(balance, clientId) VALUES(:balance, :clientId)");
    $result = $query->execute([
      "balance" => $bankAccount->getBalance(),
      "clientId" => $bankAccount->getClientId(),
    ]);
    return $result;
  }

  public function updateAccount(bankAccount $bankAccount) {
  $db = getDb();
  $query = $db->prepare("UPDATE bankAccount SET account_balance = :account_ WHERE ");
  $result = $query->execute([
    "" => $[""],
    "_id" => $id
  ]);
  $query->closeCursor();
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
