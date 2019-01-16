<?php
require "model/entity/bankAccount.php";
require "model/bankAccountManager.php";
require "model/dataBase.php";
/**
 *
 */
class bankAccountController
{
  public function showBankAccount(){
    $bankAccountManager = new bankAccountManager();
    $bankAccount = $bankAccountManager->getAccounts();
    var_dump($bankAccount);
    require "view/bankAccountView.php";
  }

}



 ?>
