<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class cidadesDAO {
    
    public static function getById($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM cidades WHERE id = $id");
        
        return mysqli_fetch_object($handle);
    }
    
    public static function getAll() {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM cidades WHERE 1");
        
        return mysqli_fetch_object($handle);
    }
    
    public static function delete($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "DELETE FROM cidades WHERE id = $id");
    
        return $handle;
    }
    
    public static function update($object, $id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "UPDATE cidades SET id=$id,nome='$object->nome',estados_id=$object->estados_id WHERE id = $id");
    
        return $handle;
    }
    
    public static function add($object) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "INSERT INTO cidades (id, nome, estados_id) VALUES ('', '$object->nome', $object->estados_id)");
    
        return $handle;
    }
    
}

?>