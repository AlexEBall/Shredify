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
        <div class="nowPlayingBar">
            <div class="nowPlayingLeft">

            </div>
            <div class="nowPlayingCenter">
                <div class="playerControls content">
                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle Button">
                            <img src="assets/images/icons/icons8-shuffle-not-active.png" alt="shuffle" />
                        </button>
                    </div>
                </div>
            </div>
            <div class="nowPlayingRight">
                
            </div>
        </div>
    </div>

</body>
</html>