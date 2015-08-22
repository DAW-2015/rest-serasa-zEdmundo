<?php

require 'connection.php';

class Cliente
{

  public static function getClienteByCPF($cpf) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM clientes WHERE cpf=$cpf";
    $result  = mysqli_query($connection, $sql);
    $cliente = mysqli_fetch_object($result);

    //recupera cidade do cliente
    $sql = "SELECT * FROM cidades WHERE id=$cliente->cidades_id";
    $result = mysqli_query($connection, $sql);
    $cliente->cidade =  mysqli_fetch_object($result);

    return $cliente;
  }


  public static function updateCliente($cliente, $id) {
    $connection = Connection::getConnection();
    $sql = "UPDATE clientes SET cpf=$cliente->cpf, nome='$cliente->nome', cidades_id=$cliente->cidades_id WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    $clienteAtualizado = Cliente::getClienteByCPF($cliente->cpf);
    return $clienteAtualizado;
  }
}
