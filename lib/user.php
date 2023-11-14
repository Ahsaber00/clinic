<?php

require_once "db.php";

class User extends db
{
    public function adduser($data)
    {
        $result=$this->insert('users',$data)->excu();
        return $result;
    }

    
    public function deleteuser($id)
    {
        $result=$this->delete('users')->where('id','=', $id)->excu();
        return $result;
    }


    public function updateuser($id,$data)
    {
        $result=$this->update('users',$data)->where('id','=', $id)->excu();
        return $result;

    }


    public function getuser()
    {
        return $this->select("users","*")->getAll();
    }


    public function getUserByEmailAndPassword($email,$password)
    {
        return $this->select("users","*")->where("email","=", $email)->andWhere("password","=", $password)->getRow();
    }

}








?>