<?php
    $songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
    $resultArray = array();
    while($row = mysqli_fetch_array($songQuery)) {
        array_push($resultArray, $row['id']);
    }

    $jsonArray = json_encode($resultArray);
?>

<script>
    $(document).ready(function() {
        currentPlayList = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(currentPlayList[0], currentPlayList, false);
    });

    function setTrack(trackId, newPlayList, play) {
        audioElement.setTrack("assets/music/bensound-highoctane.mp3");

        if(play) {
            audioElelment.play();
        }
    }
</script>

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