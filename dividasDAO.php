<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dividasDAO {

    public static function getById($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM dividas WHERE id = $id");

        return mysqli_fetch_object($handle);
    }

    public static function getAll() {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM dividas WHERE 1");

        $divis = array();

        while ($row = mysqli_fetch_object($handle))
          $divis[] = $row;

        return $divis;
    }

    public static function delete($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "DELETE FROM dividas WHERE id = $id");

        return $handle;
    }

    public static function add($object) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "INSERT INTO dividas (clientes_id, estabelecimentos_id, valor) VALUES ($object->clientes_id, $object->estabelecimentos_id, '$object->valor')");

        echo mysqli_error($con);

        if ($handle)
          return self::getById(mysqli_insert_id($con));

        return false;
    }

}

?>
