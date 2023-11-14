<?php

require_once("../validations.php");
require_once("../functions.php");
require_once("../../lib/doctor.php");
session_start();
$errors=[];
$sucsess='';

if($_SERVER['REQUEST_METHOD']=="POST"||$_SERVER['REQUEST_METHOD']=="get")
{
    foreach($_POST as $key => $value)
    {
        $$key=santhizeInput($value);
    }

    /*if(!empty($name))
    {
        $newDoctorData=[
            "name"=>$name,
        ];
        $doctor=new Doctor();
        $doctor->updateDoctor($_POST['id'],$newDoctorData);
        $sucsess='The Doctor is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateDoctor.php');
        
    }
    if(!empty($_FILES['image']['name']))
    {
       
        $image_name=$_FILES['image']['name'];
        $image_tmp= $_FILES["image"]["tmp_name"];
        move_uploaded_file($image_tmp,"../../design/uploaded_image/". $image_name);
        $newDoctorData=[
            "image"=>$image_name,
        ];
        $doctor=new Doctor();
        $doctor->updateDoctor($_POST['id'],$newDoctorData);
        $sucsess='The Doctor is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateDoctor.php');

    }
    if(!empty($bio))
    {
        
        $newDoctorData=[
          
            "bio"=>$bio,

        ];
        $doctor=new Doctor();
        $doctor->updateDoctor($_POST['id'],$newDoctorData);
        $sucsess='The Doctor is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateDoctor.php');

    }
    if(!empty($major))
    {
      
        $newDoctorData=[
            
            "major_id"=>$major

        ];
        $doctor=new Doctor();
        $doctor->updateDoctor($_POST['id'],$newDoctorData);
        $sucsess='The Doctor is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateDoctor.php');

    }

    if(!empty($name)&&!empty($_FILES['image']['name'])&&!empty($bio)&&!empty($major))*/
    {
        
        $image_name=$_FILES['image']['name'];
        $image_tmp= $_FILES["image"]["tmp_name"];
        move_uploaded_file($image_tmp,"../../design/uploaded_image/". $image_name);
        $newDoctorData=[
            "name"=>$name,
            "image"=>$image_name,
            "bio"=>$bio,
            "major_id"=>$major

        ];
        $doctor=new Doctor();
        $doctor->updateDoctor($_POST['id'],$newDoctorData);
        $sucsess='The Doctor is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateDoctor.php');
        
    }
    
}
else
{
    $errors[]="unsported method";
    $_SESSION['errors']=$errors;
    reDirect("../../admin/updateDoctor.php");
    
}




?>