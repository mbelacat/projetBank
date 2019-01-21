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
    "" => [
      "user",
      "welcome",
    ],

    "login" => [
      "user",
      "loginUser",
    ],

    // "clients" =>[
    //   "user",
    //   "showUsers",
    // ],


// BANKACCOUNT

    "addAccount" => [
      "bankAccount",
      "addNewAccount",
    ],

    "bankAccounts" => [
      "bankAccount",
      "showBankAccounts",
      // "status" => "admin"
    ],

    "bankAccount" => [
      "bankAccount",
      "showBankAccountUser",
      ["id" => ["integer"]],
      // "status" => "user"
    ],

    "bankAccountUser" => [
      "bankAccount",
      "showBankAccountUser",
      // ["id" => ["integer"]],
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
       // "recepientId" =>[ "integer"]
     ],
       // "status" => "user",
    ],

    "delete"=> [
      "bankAccount",
      "deleteBankAccount",
      ["id" => ["integer"]],
    ]

  ];
}

 ?>
