<?php
/**
 * Class to connect to the data base
 */
class dataBase {
  const host  = "localhost:8888";
  const dbName = "projetBank";
  const login = "mbela";
  const mdp = "rootroot";

  static public function BD() {
    $db = new PDO("mysql:host=" . self::host .";dbname=" . self::dbName , self::login, self::mdp);
    return $db;
  }
}
