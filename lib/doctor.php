<?php
require_once "db.php";
class Doctor extends db
{
    public function addDoctor($data)
    {
        $result=$this->insert('doctors',$data)->excu();
        return $result;
    }

    
    public function deleteDoctor($id)
    {
        $result=$this->delete('doctors')->where('id','=', $id)->excu();
        return $result;
    }


    public function updateDoctor($id,$data)
    {
        $result=$this->update('doctors',$data)->where('id','=', $id)->excu();
        return $result;

    }


    public function getDoctorList()
    {
        return $this->select("doctors","*")->getAll();
    }

    public function getDoctorById($id)
    {
        return $this->select('doctors','*')->where('id','=', $id)->getRow();
    }
    public function getDoctorByMajorId($majorId)
    {
        return $this->select('doctors','*')->where('major_id','=', $majorId)->getRow();
    }
}