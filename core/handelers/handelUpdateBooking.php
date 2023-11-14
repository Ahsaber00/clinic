<?php

require_once("../validations.php");
require_once("../functions.php");
require_once("../../lib/bookings.php");
session_start();
$errors = [];
$sucsess = '';

if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "get") {
    foreach ($_POST as $key => $value) {
        $$key = santhizeInput($value);
    }
    
        $booking = new Booking;
        $newStatus = [
            "status" => $status
        ];
        $booking->updatebooking($id, $newStatus);
        $sucsess = "The booking status is updated succesfully";
        $_SESSION['sucsses']=$sucsess;
        reDirect('../../admin/updateBooking.php');
    }


