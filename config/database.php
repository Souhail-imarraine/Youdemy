<?php

class Database{
    private $db_host = 'localhost' ;
    private $db_name = 'youdemy';
    private $username = 'root';
    private $db_password = '';
    private $pdo ;

    public function getConnection(){
        try{
            $this->pdo = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name , $this->username , $this->db_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo ;
        }catch(PDOException $err){
            echo 'error de connection database ' . $err->getMessage();
        }
    }
}