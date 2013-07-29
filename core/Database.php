<?php

class Database {

    protected $db;

    public function connect() {

        $db = June::database();
        
        try {
            $this->db = new PDO('mysql:host='.$db['host'].';dbname='.$db['db'], $db['username'], $db['password']);
            $this->db->exec("SET CHARACTER SET utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            loging($e->getMessage());
            June::error('sql');
        }
    }
    
    public function query($sql,$param = array()){
        
        try {
            $stmt = $this->db->prepare($sql);

            $stmt->execute($param);
            
            return $stmt;
        } catch (PDOException $e) {
            loging($e->getMessage());
            June::error('sql');
        }

        
        
        
    }
    
    //Get all record on sql and return array
    public function allArr($sql,$param = array()){
        
        $result = $this->query($sql,$param);
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    //Get all record on sql and return object
    public function allObj($sql,$param = array()){
       
        $result = $this->query($sql,$param);
        
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Get one record on sql and return array
    public function singleArr($sql,$param = array()){
        
        $result = $this->query($sql,$param);
        
        return $result->fetch(PDO::FETCH_ASSOC);
        
    }
    
    //Get one record on sql and return object
    public function singleObj($sql,$param = array()){
        
        $result = $this->query($sql,$param);
        
        return $result->fetch(PDO::FETCH_OBJ);
        
    }
    
    //Get num of row count or row effect
    public function rowCount($sql,$param = array()){
        
        $result = $this->query($sql,$param);
        
        return $result->rowCount();
        
    }
    
    //get value of first column
    public function column($sql,$param = array()){
        
        $result = $this->query($sql,$param);
        
        return $result->fetchColumn();
        
    }
    
    

}
