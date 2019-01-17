<?php

/**
 * Classe abstraite dont toutes les entitées ont vocation à hériter, elle contient de base un id et un hydrateur
 */
class bankAccountManager

{
  private $_db;

  public function setDb($db) {
    $this->_db = $db;
  }

  public function getDb() {
    return $this->_db;
  }

  public function getAccounts() {
    $query = $this->getDb()->query('SELECT * FROM bankAccount');
    //Si on souhaite récupérer directement des objets
    $data = $query->fetchAll(PDO::FETCH_CLASS, "bankAccount");
    //Sinon on peut utiliser fetch assoc mais il faut créer soi même les objets
    //On transforme alors chaque entrée du tableau en objet chat en l'hydratant
    // $data = $query->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($data as $key => $chat) {
    //   $data[$key] = new chat($chat);
    // }
    return $data;
  }

  public function getAccount($id){
    $query = $this->getDb()->prepare('SELECT * FROM bankAccount WHERE id = ?');
    $query->execute([$id]);
    $bankAccount = $query->fetchAll(PDO::FETCH_CLASS, "bankAccount");
    return $bankAccount;
  }

  public function updateAccount(bankAccount $bankAccount){

    $query = $this->getDb()->prepare("UPDATE bankAccount SET balance = :balance WHERE id = :id");
    $result = $query->execute([
        "id" => $bankAccount->getId(),
        "balance" => $bankAccount->getBalance()
    ]);
    return $result;
    $query->closeCursor();
  }

  public function addAccount(bankAccount $bankAccount) {
    $query = $this->getDb()->prepare("INSERT INTO bankAccount(balance, clientId) VALUES(:balance, :clientId)");
    $result = $query->execute([
      "balance" => $bankAccount->getBalance(),
      "clientId" => $bankAccount->getClientId(),
    ]);
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
