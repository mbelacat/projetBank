<?php

/**
 * Classe abstraite dont toutes les entitées ont vocation à hériter, elle contient de base un id et un hydrateur
 */
class bankAccount
{
  protected $id;
  protected $balance = 50;
  protected $clientId;

  const OVERDRAFT = 1000 ;
  const MIN_BALANCE = 50 ;



  public function getId() {return $this->id;}
  public function getBalance() {return $this->balance;}
  public function getClientId() {return $this->clientId;}

  public function setId($id) {
     return $this->id = $id;
  }

  public function setBalance($balance) {
    return $this->balance = $balance;
  }

  public function setClientId($clientId) {
    return $this->clientId = $clientId;
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
