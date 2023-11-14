<?php


function santhizeInput($input)
{
  
    $input=htmlspecialchars($input);
    $input=htmlentities($input);
    $input=stripcslashes($input);
    $input=trim($input," ");
    return $input;

}



function reDirect($location)
{
    header("location:$location");
    die;
}


function reDirectWait($sec,$location)
{
    header("Refresh: $sec; url={$location}");
    die;
}










?>