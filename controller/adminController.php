<?php
/**
 *
 */
class adminController
{

  public function welcome() {
      $message = "Bonjour voici un boilerplate PHP intégrant un système de routing";
      require "view/homeView.php";
    }

  public function loginUser() {
    echo "Voici la login";
  }
}



 ?>
