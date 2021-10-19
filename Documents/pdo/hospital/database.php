<?php


class database {


    private $bddname ="hospitale2n";
    private $username ="WordPress";
    private $password = "LHGENERAl76";

    protected function connectDatabase(){
        try{
            $db = new PDO("mysql:host=localhost;dbname=$this->bddname;charset=utf8", $this->username, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            return $db;
        } catch (PDOException $e) {
            die("error : connexion" . $e->getMessage());
        }
    }
}