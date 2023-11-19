<?php

require_once("../validations.php");
require_once("../functions.php");
require_once("../../lib/bookings.php");
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
        $errors[]= "Please enter the your name";
        $_SESSION['errors']=$errors;
        reDirect('../../doctors/doctor.php');
        


    }

    if(!reqVal($phone))
    {
        $errors[]= "Please enter the your phone";
        $_SESSION['errors']=$errors;
        reDirect('../../doctors/doctor.php');
        


    }

    if(!reqVal($email))
    {
        $errors[]= "Please enter the your email";
        $_SESSION['errors']=$errors;
        reDirect('../../doctors/doctor.php');

    }

    if(reqVal($email)&&!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[]= "Please enter a valid email";
        $_SESSION['errors']=$errors;
        reDirect('../../doctors/doctor.php');

    }
    
    if(empty($errors))
    {
        
        $bookingData=[
            "user_id"=>$user_id,
            "doctor_id"=>$doctor_id,
            "status"=>"pending"
        ];
        $bookingDeatails=[
            "name"=>$name,
            "phone"=>$phone,
            "email"=>$email
        ];
        $booking=new Booking();
        $booking->addbooking($bookingData);
        $sucsess='You have booked an appiontment succesfully';
        $_SESSION['sucsess']=$sucsess;
        reDirect('../../doctors/doctor.php');
        
    }
    
}
else
{
    $errors[]="unsported method";
    $_SESSION['errors']=$errors;
    reDirect('../../doctors/doctor.php');
    
}




?>