<?php

class Connection
{
  public static $database = "serasa";
  public static $address = "127.0.0.1";
  public static $user = "root";
  public static $password = "";

  public static function getConnection() {
    $connection = mysqli_connect(Connection::$address, Connection::$user, Connection::$password, Connection::$database);

    return $connection;
  }
}
