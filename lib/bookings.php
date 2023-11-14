<?php
require_once "db.php";
class Booking extends db
{
    public function addbooking($data)
    {
        $result=$this->insert('bookings',$data)->excu();
        return $result;
    }

    
    public function deletebooking($id)
    {
        $result=$this->delete('bookings')->where('id','=', $id)->excu();
        return $result;
    }


    public function updatebooking($id,$data)
    {
        $result=$this->update('bookings',$data)->where('id','=', $id)->excu();
        return $result;

    }


    public function getbookingList()
    {
        return $this->select("bookings","*")->getAll();
    }

    public function getbookingById($id)
    {
        return $this->select('bookings','*')->where('id','=', $id)->getRow();
    }
}