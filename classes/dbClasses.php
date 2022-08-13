<?php

/*class dbconection{
    private $host;
    private $user;
    private $pass;
    private $db;
    private function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "loginsystem";
    }
    protected function conection(){
        try {
            $db = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
            return $db ;
        } catch (PDOException $e) {
            echo "Connection Failed:" . $e->getMessage();
            die();
        }
        
    }
}*/

class dbConection
{
    protected function conection(){
        try {
            $db = new PDO("mysql:host=localhost;dbname=loginsystem",'root','');
            return $db ;
        } catch (PDOException $e) {
            echo "conection failed:". $e->getMessage(). "<br/>";
            die();
        }
    }
}

