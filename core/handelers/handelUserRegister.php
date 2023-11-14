<?php
require_once("../functions.php");
require_once("../validations.php");
require_once("../../lib/user.php");
session_start();
$errors=[];

if($_SERVER['REQUEST_METHOD']=="POST")
{
    foreach($_POST as $key => $value)
    {
        $$key=santhizeInput($value);
    }
    

    if(!reqVal($name))
    {
        $errors[]= "The name is required";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }
    else if(!minVal($name,3))
    { 
        $errors[]= "The name must be more than 3 characters";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }
    else if(!maxVal($name,25))
    {
        $errors[]= "The name must be less than 25 characters";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }

    #validation of password min:6,max:20
    if(!reqVal($password))
    {
        $errors[]= "The password is required";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }
    else if(!minVal($password,6))
    { 
        $errors[]= "The password must be more than 6 characters";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }
    else if(!maxVal($password,20))
    {
        $errors[]= "The password must be less than 20 characters";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }

    if(!reqVal($phone))
    {
        $errors[]= "Your Phone is required";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }
    

    #validation of email
    if(!reqVal($email))
    {
        $errors[]= "The email is required";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }
    else if(!emailval($email))
    {
        $errors[]="The Email must be valid";
        $_SESSION['errors']=$errors;
        reDirect('../../register.php');
    }
}
else
{
    $errors[]= "not supported method";
    $_SESSION['errors']=$errors;
    reDirect('../../register.php');
}

if(empty($errors))
{
    $userData=[
        "name"=>$name,
        "email"=>$email,
        "phone"=> $phone,
        "password"=> $password,
        "is_admin"=>0

    ];
    $user=new User();
    $user->adduser($userData);
    $_SESSION['auth']=[$name,$email];
    reDirect('../../index.php');

}












?>