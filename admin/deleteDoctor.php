<?php
require_once "../lib/doctor.php";
require_once "../core/functions.php";
session_start();
if(!isset($_SESSION['auth']))
{
  reDirect("auth/login.php");
}
$doctor=new Doctor();
$doctor->deleteDoctor($_GET['id']);
reDirect('doctorsList.php');