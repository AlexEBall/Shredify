<?php
    class Account {

        private $errorArray;

        public function __construct() {
            $this->errorArray = array();
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

            // check if it doesn't already exsist

        }

        private function validateFirstName($firstName) {
            if(strlen($firstName) > 25 || strlen($firstName) < 2) {
                array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
                return;
            }
        }

        private function validateLastName($Lastname) {
            if(strlen($Lastname) > 25 || strlen($Lastname) < 2) {
                array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
                return;
            }
        }

        private function validateEmails($em, $em2) {
            if($email != $email2) {
                array_push($this->errorArray, "Your emails don't match");
                return;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, "The email is invalid");
                return;
            }

            //TODO: check if email has been used
        }

        private function validatePasswords($pw, $pw2) {
            if($pw != $pw2) {
                array_push($this->errorArray, "Your emails don't match");
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pw)) {
                array_push($this->errorArray, "Your password can only contain numbers and letters");
                return;
            }

            if(strlen($pw) > 30 || strlen($pw) < 5) {
                array_push($this->errorArray, "Your password must be between 5 and 30 characters");
                return;
            }
        }

    }
?>