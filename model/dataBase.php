<?php
/**
 * Class to connect to the data base
 */
class dataBase {
  const host  = "localhost";
  const dbName = "projetBank";
  const login = "root";
  const mdp = "";

  static public function BD() {
    $db = new PDO("mysql:host=" . self::host .";dbname=" . self::dbName , self::login, self::mdp);
    return $db;
  }
}
