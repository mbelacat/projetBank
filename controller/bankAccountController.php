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

  public function addNewAccount()
  {
    $bankAccountManager = new bankAccountManager();
    $newBankAccount = new bankAccount($_POST);
    // var_dump($newBankAccount);
    var_dump($_POST);
    if ($newBankAccount->setBalance50($_POST['balance'])) {
      $bank = $bankAccountManager->addAccount($newBankAccount);
    }
    // var_dump($bank);
    require "view/form/createAccountForm.php";
  }
}




 ?>
