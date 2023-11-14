<?php 
require_once '../lib/db.php';
require_once '../lib/majors.php';
include_once "../core/functions.php";
session_start() ;
if(!isset($_SESSION['auth']))
{
  reDirect("auth/login.php");
}

$major=new Major();
$major->deleteMajor($_GET['id']);
reDirect('majorsList.php');










?>