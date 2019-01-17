<?php

//Function qui retourne un tableau contenant les routes de notre application

//Modèle des routes
//"NomDeLaRoute" => [
//  "Controller",
//  "Fonction",
//  Optionnel [
//    "parametre1" => ["typeAttendu", optionnel[valeurAttendu]],
//    "parametre2" => ["typeAttendu", optionnel[valeurAttendu]]
//  ]
// "status" => "role"
//]
function getRoutes() {
  return [


    "login" => [
      "admin",
      "loginUser",
    ],
<<<<<<< HEAD
    "addAccount" => [
      "bankAccount",
      "addNewAccount"
    ]
=======

    "bankAccounts" => [
      "bankAccount",
      "showBankAccounts",
      // "status" => "admin"
    ],

    "bankAccount" => [
      "bankAccount",
      "showBankAccount",
      // "status" => "user"
    ],

    "withdrawal"=> [
      "bankAccount",
      "makeWithdrawal",
      ["id" => ["integer"]],
      // "status" => "user",
    ],

    "credit"=> [
      "bankAccount",
      "makeCredit",
      ["id" => ["integer"]],
      // "status" => "user",
    ],

    "transfert"=> [
      "bankAccount",
      "makeTransfert",
      ["id" => ["integer"],
       "recepientId" =>[ "integer"]],
       // "status" => "user",
    ],

>>>>>>> 995b378d9eb57e4d67b0ff1ceedf86254ba85fde
  ];
}

 ?>
