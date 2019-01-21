<?php
require "model/entity/user.php";
require "model/userManager.php";
require "model/dataBase.php";

/**
 *
 */
class userController
{

  public function welcome() {
      $message = "Bienvenue sur La banque";
      require "view/homeView.php";
    }

  public function loginUser() {
    require "view/loginFormView.php";
  }

  // public function showUsers() {
  //   $userManager = new userManager();
  //   $users = $userManager->getUsers();
  //   require "view/View.php";
  // }
}



 ?>
