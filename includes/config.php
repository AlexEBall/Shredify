<?php
    // turns on output buffering
    // sends data to the sever in pieces
    ob_start();
    // need to set the timezone
    $timezone = date_default_timezone_set("America/Los_Angeles");

    $con = mysqli_connect("localhost", "root", "", "shredify");

    if(mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    }
?>