<?php
session_start();
include_once ("../validations.php");
include_once ("../functions.php");
include_once ("../../lib/admin.php");
$errors=[];   


if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['submit']))
{
    if(!reqVal($_POST["email"]))
    {
        $errors[]="Please enter your email";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/auth/login.php');

    }
    if(!reqVal($_POST["password"]))
    {
        $errors[]= "Please enter your password";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/auth/login.php');
    }
    else if(!reqVal($_POST["password"])&&!reqVal($_POST["email"]))
    {
        $errors[]= "Please enter your email and password";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/auth/login.php');
    }
    if(!emailVal($_POST['email']))
    {
        $errors[]= "Please enter a valid email";
        $_SESSION['errors']=$errors;
        reDirect('../../admin/auth/login.php');
    }
    if(reqVal($_POST["email"])&&reqVal($_POST["password"])&&emailVal($_POST['email']))
    {
        
        foreach($_POST as $key => $value)
        {
            $$key=santhizeInput($value);
        }
        $admin=new Admin;
        $userData=$admin->getAdminByEmailAndPassword($email,$password);
        if(!empty($userData))
        {
            $_SESSION['auth']=$userData;
            reDirect('../../admin/index.php');
        }
        else
        {
            $errors[]= 'Wrong Email or Password';
            $_SESSION['errors']=$errors;
            reDirect('../../admin/auth/login.php');
        }
    }
    
}







?>