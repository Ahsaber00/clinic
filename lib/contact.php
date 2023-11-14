<?php
require_once "db.php";
class Contact extends db
{
    public function addContact($data)
    {
        $result=$this->insert('contact',$data)->excu();
        return $result;
    }

    
    public function deletecontact($id)
    {
        $result=$this->delete('contact')->where('id','=', $id)->excu();
        return $result;
    }


    public function updatecontact($id,$data)
    {
        $result=$this->update('contact',$data)->where('id','=', $id)->excu();
        return $result;

    }


    public function getcontactList()
    {
        return $this->select("contact","*")->getAll();
    }

    public function getcontactById($id)
    {
        return $this->select('contact','*')->where('id','=', $id)->getRow();
    }
    public function getcontactByMajorId($majorId)
    {
        return $this->select('contact','*')->where('major_id','=', $majorId)->getRow();
    }
}