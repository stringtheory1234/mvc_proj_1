<?php

namespace Models;
class Signup{
	public static function getDB()
    {
        include __DIR__."/../../configs/credentials.php" ;
        return new \PDO("mysql:dbname=".
        $db_connect['db_name'].";host=".
        $db_connect['server'] , 
        $db_connect['username'] , 
        $db_connect['password']);


    }
	public static function AddUser($name, $enrollment, $username, $password){

		$db=self::getDB();
		$password_hash=hash('sha256', $password);
		//:username is a placeholder.
		$user1=$db->prepare("SELECT * FROM users WHERE username=:username");
		$user1->execute(array(
			"username"=>$username
		));
		$result=$user1->fetchAll();
		if(count($result)>0){
			return "user taken";
		}else{
		$user=$db->prepare("INSERT INTO users (name, enrollment, username, password) VALUES (:name, :enrollment, :username, :password)");
			$user->execute(array(
				"name"=>$name,
				"enrollment"=>$enrollment,
				"username"=>$username,
				"password"=>$password_hash
			));	
			return "success";
	}
}
}

?>