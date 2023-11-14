<?php
require_once("db.php");

class Major extends db
{
    public function addMajor($data)
    {
        $result=$this->insert('majors',$data)->excu();
        return $result;
    }

    
    public function deleteMajor($id)
    {
        $result=$this->delete('majors')->where('id','=', $id)->excu();
        return $result;
    }


    public function updateMajor($id,$data)
    {
        $result=$this->update('majors',$data)->where('id','=', $id)->excu();
        return $result;

    }


    public function getMajorList()
    {
        return $this->select("majors","*")->getAll();
    }

    
    public function getMajorById($id)
    {
        return $this->select('majors','*')->where('id','=', $id)->getRow();
    }



}




?>