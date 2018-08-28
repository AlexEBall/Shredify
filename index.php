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

    <div class="mainContainer">

        <div class="topContainer">
            <?php include("includes/navBarContainer.php"); ?>
        </div>

        <div class="nowPlayingBarContainer">
            <div class="nowPlayingBar">
                <div class="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img class="albumArtwork" src="https://upload.wikimedia.org/wikipedia/en/thumb/d/dc/Megadeth-RustInPeace.jpg/220px-Megadeth-RustInPeace.jpg" alt="album" />
                        </span>

                        <div class="trackInfo">
                            <span class="trackName">
                                <span>Tornado of Souls</span>
                            </span>

                            <span class="artistName">
                                <span>Megadeth</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="nowPlayingCenter">
                    <div class="playerControls content">
                        <div class="buttons">
                            <button class="controlButton shuffle" title="Shuffle Button">
                                <img src="assets/images/icons/icons8-shuffle-not-active.png" alt="shuffle" />
                            </button>

                            <button class="controlButton previous" title="Previous Button">
                                <img src="assets/images/icons/icons8-skip_to_start.png" alt="previous" />
                            </button>

                            <button class="controlButton play" title="Play Button">
                                <img src="assets/images/icons/icons8-play.png" alt="play" />
                            </button>

                            <button class="controlButton pause" title="Pause Button" style="display: none;">
                                <img src="assets/images/icons/icons8-pause-not-active.png" alt="pause" />
                            </button>

                            <button class="controlButton next" title="Next Button">
                                <img src="assets/images/icons/icons8-end.png" alt="next" />
                            </button>

                            <button class="controlButton repeat" title="Repeat Button">
                                <img src="assets/images/icons/icons8-repeat.png" alt="repeat" />
                            </button>
                        </div>
                        <div class="playbackBar">
                            <span class="progressTime current">0.00</span>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                            <span class="progressTime remaining">0.00</span>
                        </div>
                    </div>
                </div>
                <div class="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume Button">
                            <img src="assets/images/icons/icons8-room_sound_filled.png" alt="Volume Button" />
                        </button>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

</body>
</html>