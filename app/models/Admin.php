<?php
namespace Models;

class Admin{

	public static function getDB()
    {
        include __DIR__."/../../configs/credentials.php" ;
        
        return new \PDO("mysql:dbname=".
        $db_connect['db_name'].";host=".
        $db_connect['server'] , 
        $db_connect['username'] , 
        $db_connect['password']);


    }
    public static function addques($question, $ans){
        $db=self::getDB();
        if(!empty($question) || !empty($ans)){
        $sql = $db->prepare("INSERT INTO ques(question, answer) VALUES(:question, :ans)");
        $sql->execute(array(
            "question"=>$question,
            "ans"=>$ans
        ));
        return true;
    }


    }
}

