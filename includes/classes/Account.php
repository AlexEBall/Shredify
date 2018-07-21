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

            if(empty($this->errorArray)) {
                // no errors because it is empty
                // can push into db
                return true;
            } else {
                // which means there are errors
                return false;
            }
        }

        public function getError($error) {
            // if it doesn't exsist
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function validateUserName($username) {
            // echo 'echo';
            if(strlen($username) > 25 || strlen($username) < 5) {
                array_push($this->errorArray, Constants::$userNameCharacters);
                return;
            }

            // check if it doesn't already exsist

        }

        private function validateFirstName($firstName) {
            if(strlen($firstName) > 25 || strlen($firstName) < 2) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }

        private function validateLastName($Lastname) {
            if(strlen($Lastname) > 25 || strlen($Lastname) < 2) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }

        private function validateEmails($em, $em2) {
            if($em != $em2) {
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            //TODO: check if email has been used
        }

        private function validatePasswords($pw, $pw2) {
            if($pw != $pw2) {
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pw)) {
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }

            if(strlen($pw) > 30 || strlen($pw) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
        }

    }
?>