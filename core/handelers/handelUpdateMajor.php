<?php

require_once("../validations.php");
require_once("../functions.php");
require_once("../../lib/majors.php");
session_start();
$errors=[];
$sucsess='';

if($_SERVER['REQUEST_METHOD']=="POST"||$_SERVER['REQUEST_METHOD']=="get")
{
    foreach($_POST as $key => $value)
    {
        $$key=santhizeInput($value);
    }
    if(!empty($_FILES['image']['name'])&&empty($name))
    {
        $image_name=$_FILES['image']['name'];
        $image_tmp= $_FILES["image"]["tmp_name"];
        move_uploaded_file($image_tmp,"../../design/uploaded_image/". $image_name);
        $newMajorData=[
            
            "image"=>$image_name
    
        ];
        $major=new Major;
        $major->updateMajor($id,$newMajorData);
        $sucsess='The major is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateMajor.php');
    }

    if(empty($_FILES['image']['name'])&&!empty($name))
    {
        $newMajorData=[
            
            "name"=>$name
    
        ];
        $major=new Major;
        $major->updateMajor($id,$newMajorData);
        $sucsess='The major is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateMajor.php');
    }

    if(!empty($_FILES['image']['name'])&&!empty($name))
    {
        $image_name=$_FILES['image']['name'];
        $image_tmp= $_FILES["image"]["tmp_name"];
        move_uploaded_file($image_tmp,"../../design/uploaded_image/". $image_name);
        $newMajorData=[
            "name"=>$name,
            "image"=>$image_name
        ];
        $major=new Major;
        $major->updateMajor($id,$newMajorData);
        $sucsess='The major is updated succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../admin/updateMajor.php');
    }
}
else
{
    $errors[]="unsported method";
    $_SESSION['errors']=$errors;
    reDirect("../../admin/updateMajor.php");
    
}




?>