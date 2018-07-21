<?php
    class Account {

        private $errorArray;

        public function __construct() {
            $this->$errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
            $this->validateUserName($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);
        }

        private function validateUserName($username) {
            // echo 'echo';
            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, "Your username must be between 5 and 25 characters");
                return;
            }
        }

        private function validateFirstName($firstName) {
            
        }

        private function validateLastName($Lastname) {
            
        }

        private function validateEmails($em, $em2) {
            
        }

        private function validatePasswords($pw, $pw2) {
            
        }

    }
?>