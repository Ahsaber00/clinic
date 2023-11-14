<?php

require_once("../validations.php");
require_once("../functions.php");
require_once("../../lib/majors.php");
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
        reDirect('../../admin/addMajors.php');
        


    }
    if(!reqVal($_FILES['image']['name']))
    {
        $errors[]= "Please upload the image of the major";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/addMajors.php');
        

    }
    if(!reqVal($_FILES['image']['name'])&&!reqVal($name))
    {
        $errors[]= "Please write the image of the major and upload its image";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/addMajors.php');
        

    }

    if(reqVal($name)&&reqVal($_FILES['image']['name']))
    {
        
        $image_name=$_FILES['image']['name'];
        $image_tmp= $_FILES["image"]["tmp_name"];
        move_uploaded_file($image_tmp,"../../design/uploaded_image/". $image_name);
        $newMajorData=[
            "name"=>$name,
            "image"=>$image_name

        ];
        $major=new Major;
        $major->addMajor($newMajorData);
        $sucsess='The major is inserted succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/addMajors.php');
        
    }
    
}
else
{
    $errors[]="unsported method";
    $_SESSION['errors']=$errors;
    reDirect("../../admin/addMajors.php");
    
}




?>