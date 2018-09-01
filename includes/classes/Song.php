<?php
    class Song {
        private $con;
        private $id;
        private $mysqliData;
        private $title;
        private $artistId;
        private $albumId;
        private $duration;
        private $path;
        private $genre;

        public function __construct($con, $id) {
            $this->con = $con;
            $this->id = $id;

            $songQuery = mysqli_query($this->con, "SELECT * FROM Songs WHERE id='$this->id'");
            $this->mysqliData = mysqli_fetch_array($songQuery);

            $this->title = $this->mysqliData['title'];
            $this->artistId = $this->mysqliData['artist'];
            $this->albumId = $this->mysqliData['album'];
            $this->duration = $this->mysqliData['duration'];
            $this->path = $this->mysqliData['path'];
            $this->genre = $this->mysqliData['genre'];
        }

        public function getTitle() {
            return $this->title;
        }

        public function getArtist() {
            return new Artist($this->con, $this->artistId);
        }

        public function getAlbum() {
            return new Alubm($this->con, $this->albumId);
        }

        public function getDuration() {
            return $this->duration;
        }

        public function getPath() {
            return $this->path;
        }

        public function getMysqliData() {
            return $this->mysqliData;
        }
        
        public function getGenre() {
            return $this->genre;
        }
    }
?>