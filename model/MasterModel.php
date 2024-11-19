<?php
include_once '../lib/conf/conection.php';

class MasterModel extends Connection {
    public function insert($sql) {
        $result = pg_query($this->getConnect(), $sql);
        return $result;
    }

    public function consult($sql) {
        $result = pg_query($this->getConnect(), $sql); 
        if (!$result) { 
            echo "Error en la consulta: " . pg_last_error($this->getConnect()); 
            return false; 
        } 
        $result = pg_fetch_all($result); 
        
        return $result;
    }

    public function update($sql) {
        $result = pg_query($this->getConnect(), $sql);
        return $result;
    }

    public function delete($sql) {
        $result = pg_query($this->getConnect(), $sql);
        return $result;
    }

    // public function autoIncrement($field, $table) {
    //     $sql = "SELECT MAX($field) FROM $table";
    //     $result = pg_query($this->getConnect(), $sql);

    //     if ($result) {
    //         $resp = pg_fetch_row($result);
    //         return $resp[0]; // Return the maximum value found
    //     }
        
    //     return null; // Return null if the query failed
    // }
}
?>