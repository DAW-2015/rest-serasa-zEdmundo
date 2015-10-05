<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class estadosDAO {

    public static function getById($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM estados WHERE id = $id");

        return mysqli_fetch_object($handle);
    }

    public static function getAll() {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM estados WHERE 1");

        $estados = array();

        while ($row = mysqli_fetch_object($handle))
          $estados[] = $row;

        return $estados;
    }

    public static function delete($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "DELETE FROM estados WHERE id = $id");

        return $handle;
    }

    public static function update($object, $id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "UPDATE estados SET id=$id,nome='$object->nome' WHERE id = $id");

        return $handle;
    }

    public static function add($object) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "INSERT INTO estados (id, nome) VALUES ('', '$object->nome')");

        return self::getById(mysqli_insert_id($con));
    }

}

?>
