<?php
include("../functions.php");
include("../../lib/user.php");
include("../validations.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
    foreach($_POST as $key => $value)
    {
        $$key=santhizeInput($value);
    }

    if(!reqVal($_POST["email"]))
    {
        $errors[]="Please enter your email";
        $_SESSION['errors']=$errors;
        reDirect('../../login.php');

    }
    if(!reqVal($_POST["password"]))
    {
        $errors[]= "Please enter your password";
        $_SESSION['errors']=$errors;
        reDirect('../../login.php');
    }
    else if(!reqVal($_POST["password"])&&!reqVal($_POST["email"]))
    {
        $errors[]= "Please enter your email and password";
        $_SESSION['errors']=$errors;
        reDirect('../../login.php');
    }
    if(!emailVal($_POST['email']))
    {
        $errors[]= "Please enter a valid email";
        $_SESSION['errors']=$errors;
        reDirect('../../login.php');
    }

    if(empty($errors))
    {
        
        $user=new User();
        $loginData=$user->getUserByEmailAndPassword($email, $password);
        if(!empty($loginData))
        {
            $_SESSION['auth']=$loginData;
            reDirect('../../index.php');
        }

        else
        {
            $errors[]='Wrong Email or Password';
            $_SESSION['errors']=$errors;
            reDirect('../../login.php');
        }


    }


}









?>