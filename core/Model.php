<?php

class Model {

    public $db;

    public function __construct() {

        $databse = new Database;

        //connect database using PDO
        $databse->connect();
        
        $this->db = $databse;
    }
    
    public function get($table , $from = 0,$limit = 0){
        $cond = '';
        if($limit)
        {
            $cond = " LIMIT $from , $limit"; 
        }
        $sql = 'SELECT * FROM ' . $table . $cond;

        return $this->db->allArr($sql);
        
    }
    
    public function get_where($table ,$where, $from = 0,$limit = 0){
        
        $cond = $str_where = '';
        $param = array();
        
        if($limit)
        {
            $cond = " LIMIT $from , $limit"; 
        }
        
        if($where)
        {
            foreach($where as $key => $item)
            {
                $str_where .= $key . ' = :' . $key;
                if($key != keyEnd($where))
                {
                    $str_where .= ' and ';
                }
                $param[':' . $key] = $item;
            }
        }
        
        $sql = 'SELECT * FROM ' . $table . ' WHERE  ' . $str_where . $cond;
        
        return $this->db->allArr($sql,$param);
        
    }

}
