<?php
namespace Models;

class Leader{

	public static function getDB()
    {
        include __DIR__."/../../configs/credentials.php" ;
        
        return new \PDO("mysql:dbname=".
        $db_connect['db_name'].";host=".
        $db_connect['server'] , 
        $db_connect['username'] , 
        $db_connect['password']);


    }
    public static function getleader(){
        $db=self::getDB();
        $sql = $db->prepare("SELECT username, count(correct) FROM solved GROUP BY username ");
        $sql->execute();
        $conc='';
        $result=$sql->fetchAll();
        for ($i=0; $i <count($result) ; $i++) { 
            $conc.=$result[$i][0]." &nbsp;&nbsp;&nbsp;&nbsp;".$result[$i][1].'</br>';
        }
        return $conc;


    }
}

