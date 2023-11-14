<?php
require_once "db.php";
class BookingDetails extends db
{
    public function addBookingDetail($data)
    {
        $result=$this->insert('booking_details',$data)->excu();
        return $result;
    }

    public function getBookingList()
    {
        return $this->select("booking_details","*")->getAll();
    }

    public function getbookingById($id)
    {
        return $this->select('booking_details','*')->where('id','=', $id)->getRow();
    }
}