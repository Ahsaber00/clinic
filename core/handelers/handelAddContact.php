<?php
require_once "../functions.php";
require_once "../../lib/contact.php";
session_start();
$errors=[];
$sucsess="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    foreach($_POST as $key => $value)
    {
        $$key=santhizeInput($value);
    }

    $contact=new Contact();
    $contactData=[
        "name"=>$name,
        "phone"=> $phone,
        "email"=> $email,
        "subject"=>$subject,
        "message"=>$message
    ];
    $contact->addContact($contactData);
    $sucsess="Your message is sent sucsessfully and wait for our response very soon";
    $_SESSION['sucsess']=$sucsess;
    reDirect('../../contact.php');

}

else
{
    $errors[]="unsported method";
    $_SESSION['errors']=$errors;
    reDirect('../../contact.php');
}

