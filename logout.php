<?php

include_once("core/functions.php");
session_start();

if(isset($_SESSION['auth']))
{
    unset($_SESSION['auth']);
    session_destroy();
    reDirect('index.php');
}




?>