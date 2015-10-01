<?php

class Connection
{
  public static $database = "daw-aluno8";
  public static $address = "alunos.coltec.ufmg.br";
  public static $user = "daw-aluno8";
  public static $password = "edmundo";

  public static function getConnection() {
    $connection = mysqli_connect(Connection::$address, Connection::$user, Connection::$password, Connection::$database);

    return $connection;
  }
}
