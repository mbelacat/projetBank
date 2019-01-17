<?php

/**
 * Classe abstraite dont toutes les entitées ont vocation à hériter, elle contient de base un id et un hydrateur
 */
class bankAccount
{
  protected $id;
  protected $balance;
  protected $clientId;
  protected $accountName;

  const OVERDRAFT = 1000 ;
  const MIN_BALANCE = 50 ;



  public function getId() {return $this->id;}
  public function getBalance() {return $this->balance;}
  public function getClientId() {return $this->clientId;}
  public function getAccountName() {return $this->accountName;}

  public function setId($id) {
     return $this->id = $id;
  }

  public function setBalance50(int $balance) {
    if ($this->balance >= self::MIN_BALANCE) {
      $this->balance = $balance;
    }
  }

  public function setBalance(int $balance) {
    return $this->balance = $balance;
  }

  public function setClientId(int $clientId) {
    return $this->clientId = $clientId;
  }

  public function setAccountName(string $accountName) {
    return $this->accountName = $accountName;
  }

  public function withdrawal(int $amount){
    if((isset($amount) && !empty($amount)) && ((self::OVERDRAFT + $this->balance - $amount) > 0)){
      $this->balance .= $amount;
      return true;
    }
    return false;
  }

  public function credit(int $amount){
      if ($this->balance -= $amount){
        return true;
      }
  }

  public function transfert(int $amount,bankAccount $bankAccount){
    if($this->balance > 0  &&  (self::OVERDRAFT + $this->balance - $amount) > 0){
        if($this->withdrawal($amount) && $bankAccount->credit()){
          // demander à thomas
          return true;
        }

    }
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

  public function __construct(array $donnees = null)
  {
    if($donnees)
    {
      $this->hydrate($donnees);
    }
  }


}


 ?>
