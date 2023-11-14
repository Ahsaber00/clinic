<?php 
require_once ("db.php");

class admin extends db
{
    public function getAdminByEmailAndPassword($email, $password)
    {
        return $this->select("users","*")->where("email","=",$email)->andWhere("password","=",$password)->getRow();
    }   
}



?>