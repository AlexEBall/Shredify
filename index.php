<?php
    // reference to the session start
    include("includes/config.php");
    // log out manually
    // session_destroy();

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
</head>
<body>
    
    <div class="nowPlayingBarContainer">

    </div>

</body>
</html>