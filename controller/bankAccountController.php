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
    $id = intval($_GET['id']);
    $bankAccount = $bankAccountManager->getAccount($id);
    var_dump($bankAccount);
    require "view/bankAccountView.php";
  }

  public function addNewAccount()
  {
    $bankAccountManager = new bankAccountManager();
    $newBankAccount = new bankAccount($_POST);
    $bankAccountManager->addAccount($newBankAccount);
    var_dump($newBankAccount);
    // var_dump($newBankAccount->setBalance50($balance));
    // var_dump($newBankAccount);
    // var_dump($newBankAccount->getAccountName());

    // if () {
    //   $bank = $bankAccountManager->addAccount($newBankAccount);
    // }
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
     require "view/withdrawalAccountFormView.php";
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
    require "view/creditAccountFormView.php";
  }

  public function makeTransfert(){
    $bankAccountManager = new bankAccountManager();
    $bankAccounts = $bankAccountManager->getAccounts();
    $bankAccountManagerOK = $bankAccountManager->getAccount($_GET['id']);
    $bankAccountManagerOK = $bankAccountManagerOK[0];
    $balance = $bankAccountManagerOK->getBalance();
    if($bankAccountManagerOK->withdrawal(intval($_POST["amount"]))){
      $newBalance = $balance - $_POST["amount"];
      $bankAccountManagerOK->setBalance($newBalance);
      if($bankAccountManager->updateAccount($bankAccountManagerOK)){
        $bankAccountManagerOK = $bankAccountManager->getAccount($_POST['recepientId']);
        $bankAccountManagerOK = $bankAccountManagerOK[0];
        $balance = $bankAccountManagerOK->getBalance();
        $newBalance = $balance + $_POST["amount"];
        $bankAccountManagerOK->setBalance($newBalance);
        if($bankAccountManager->updateAccount($bankAccountManagerOK)){
          redirectTo("bankAccount");
        }
      }
    }
    require "view/transfertAccountFormView.php";
  }

  public function deleteBankAccount(){
    if(isset($_GET['id'])){
      $bankAccountManager = new bankAccountManager();
      $id = intval($_GET['id']);
      $bankAccountManagerOK = $bankAccountManager->delete($_GET['id']);
      redirectTo("bankAccount");
    }
  }
}

 ?>
