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
        updateVolumeProgressBar(audioElement.audio);

        $(".nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e) {
            e.preventDefault();
        })

        $(".playbackBar .progressBar").mousedown(function() {
            mouseDown = true;
        });

        $(".playbackBar .progressBar").mousemove(function(e) {
            if (mouseDown) {
                // set time of song, depending on position of mouse
                timeFromOffset(e, this);
            }
        });

        $(".playbackBar .progressBar").mouseup(function(e) {
            timeFromOffset(e, this);
        });

        $(document).mouseup(function() {
            mouseDown = false;
        });

        $(".volumeBar .progressBar").mousedown(function() {
            mouseDown = true;
        });

        $(".volumeBar .progressBar").mousemove(function(e) {
            if (mouseDown) {
                var percentage = e.offsetX / $(this).width();
                if (percentage >= 0 && percentage <= 1) {
                    audioElement.audio.volume = percentage;
                }
            }
        });

        $(".volumeBar .progressBar").mouseup(function(e) {
            var percentage = e.offsetX / $(this).width();
                if (percentage >= 0 && percentage <= 1) {
                    audioElement.audio.volume = percentage;
                }
        });
    });

    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }

    function nextSong() {
        if(currentIndex === currentPlayList.length - 1) {
            currentIndex = 0;
        } else {
            currentIndex++;
        }

        var trackToPlay = currentPlayList[currentIndex];
        setTrack(trackToPlay, currentPlayList, true);
    }

    function setTrack(trackId, newPlayList, play) {
        
        $.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {
            currentIndex = currentPlayList.indexOf(trackId);
            var track = JSON.parse(data);

            $(".trackNameNP span").text(track.title);

            $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
                var artist = JSON.parse(data);

                $(".artistNameNP span").text(artist.name);
            });

            $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
                var album = JSON.parse(data);

                $(".albumLink img").attr("src", album.artworkPath);
            });

            audioElement.setTrack(track);
            playSong();
        });

        if(play) {
            audioElement.play();
        }
    }

    function playSong() {
        if (audioElement.audio.currentTime === 0) {
            $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
        }
        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    }

    function pauseSong() {
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    }
</script>

<div class="nowPlayingBarContainer">
    <div class="nowPlayingBar">
        <div class="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img class="albumArtwork" src="" alt="album" />
                </span>

                <div class="trackInfoNP">
                    <span class="trackNameNP">
                        <span></span>
                    </span>

                    <span class="artistNameNP">
                        <span></span>
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

                    <button class="controlButton play" title="Play Button" onclick="playSong()">
                        <img src="assets/images/icons/icons8-play.png" alt="play" />
                    </button>

                    <button class="controlButton pause" title="Pause Button" style="display: none;" onclick="pauseSong()">
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