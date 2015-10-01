<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// get by something, get all, delete, update, add

class estabelecimentoDAO {
    
    public static function getById($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM estabelecimentos WHERE id = $id");
        
        return mysqli_fetch_object($handle);
    }
    
    public static function getAll() {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "SELECT * FROM estabelecimentos WHERE 1");
        
        return mysqli_fetch_object($handle);
    }
    
    public static function delete($id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "DELETE FROM estabelecimentos WHERE id = $id");
    
        return $handle;
    }
    
    public static function update($object, $id) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "UPDATE estabelecimentos SET id=$id,nome='$object->nome',cidades_id=$object->cidades_id WHERE id = $id");
    
        return $handle;
    }
    
    public static function add($object) {
        $con = Connection::getConnection();
        $handle = mysqli_query($con, "INSERT INTO estabelecimentos (id, nome, cidades_id) VALUES ('', '$object->nome', $object->cidades_id)");
    
        return $handle;
    }
    
}

?>
