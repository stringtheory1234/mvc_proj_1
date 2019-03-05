<?php
namespace Models;

class GetData{

	public static function getDB()
    {
        include __DIR__."/../../configs/credentials.php" ;
        
        return new \PDO("mysql:dbname=".
        $db_connect['db_name'].";host=".
        $db_connect['server'] , 
        $db_connect['username'] , 
        $db_connect['password']);


    }
    public static function getusers(){
        $db=self::getDB();
        $sql = $db->prepare("SELECT * FROM ques");
        $sql->execute();

        /* Fetch all of the remaining rows in the result set */
        $result = $sql->fetchAll();
        $concat='';

        for ($i=0; $i < count($result); $i++) { 
            $concat.="Question:".$result[$i][0].'<div class="question">
        <p>'.$result[$i][1].'</p>
        <input type="text" name="v'.$result[$i][0].'" id="v'.$result[$i][0].'">
        <button type="submit" name="submit'.$result[$i][0].'" onclick="myfunc('.$result[$i][0].')" id="'.$result[$i][0].'">submit</button>
    </div>'.'</br>';

        }
        return $concat;

    }
}

