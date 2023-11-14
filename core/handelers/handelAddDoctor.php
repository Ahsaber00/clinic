<?php

require_once("../validations.php");
require_once("../functions.php");
require_once("../../lib/doctor.php");
session_start();
$errors=[];
$sucsess='';

if($_SERVER['REQUEST_METHOD']=="POST")
{
    foreach($_POST as $key => $value)
    {
        $$key=santhizeInput($value);
    }

    if(!reqVal($name))
    {
        $errors[]= "Please enter the major name";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/addDoctors.php');
        


    }
    if(!reqVal($_FILES['image']['name']))
    {
        $errors[]= "Please upload the image of the major";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/addDoctors.php');
        

    }
    if(!reqVal($bio))
    {
        $errors[]= "Please write the BIO of the doctor";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/addDoctors.php');
        

    }
    if(!reqVal($major))
    {
        $errors[]= "Please choose the major of the doctor form the list";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/addDoctors.php');
        

    }

    if(empty($errors))
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
        $doctor->addDoctor($newDoctorData);
        $sucsess='The Doctor is added succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/addDoctors.php');
        
    }
    
}
else
{
    $errors[]="unsported method";
    $_SESSION['errors']=$errors;
    reDirect("../../admin/addDoctors.php");
    
}




?>