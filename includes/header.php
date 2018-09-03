<?php
    // reference to the session start
    include("includes/config.php");
    // log out manually
    // session_destroy();
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");
    include("includes/classes/Song.php");

    if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = $_SESSION['userLoggedIn'];
    } else {
        header("Location: register.php");
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/scripts.js"></script>
</head>
<body>

    <div class="mainContainer">

        <div class="topContainer">
            <?php include("includes/navBarContainer.php"); ?>

            <div class="mainViewContainer">
                <div class="mainContent">