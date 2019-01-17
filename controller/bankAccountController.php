<?php
require "model/entity/bankAccount.php";
require "model/bankAccountManager.php";
require "model/dataBase.php";
/**
 *
 */
class bankAccountController
{
  public function showBankAccounts(){
    $bankAccountManager = new bankAccountManager();
    $bankAccounts = $bankAccountManager->getAccounts();
    require "view/bankAccountsView.php";
  }

  public function showBankAccount(){
    $bankAccountManager = new bankAccountManager();
    $bankAccounts = $bankAccountManager->getAccount();
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

  public function makeWithdrawal(){
     if(!empty($_POST)){
       $bankAccountManager = new bankAccountManager();
       $id = intval($_GET['id']);
       $bankAccountManagerOK = $bankAccountManager->getAccount($_GET['id']);
       $bankAccountManagerOK = $bankAccountManagerOK[0];
       $balance = $bankAccountManagerOK->getBalance();
       if($bankAccountManagerOK->withdrawal(intval($_POST["amount"]))){
         $newBalance = $balance - $_POST["amount"];
         $bankAccountManagerOK->setBalance($newBalance);
         $bankAccountManager->updateAccount($bankAccountManagerOK);
         redirectTo("bankAccounts");
       }
       echo "Vous avez atteint le decouvert autorisé!";
     }
     require "view/form/withdrawalAccountForm.php";
  }

  public function makeCredit(){


     if(!empty($_POST)){
       $bankAccountManager = new bankAccountManager();
       $id = intval($_GET['id']);
       $bankAccountManagerOK = $bankAccountManager->getAccount($_GET['id']);
       $bankAccountManagerOK = $bankAccountManagerOK[0];
       $balance = $bankAccountManagerOK->getBalance();
       $newBalance = $balance + $_POST["amount"];
       $bankAccountManagerOK->setBalance($newBalance);
       $bankAccountManager->updateAccount($bankAccountManagerOK);
       redirectTo("bankAccounts");
    }
    require "view/form/creditAccountForm.php";
  }

  public function makeTransfert(){
    require "view/form/transfertAccountForm.php";
  }
}

 ?>
