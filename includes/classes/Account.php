<?php
    class Account {

        private $con;
        private $errorArray;

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

        public function login($un, $pw) {
            $pw = md5($pw);

            $query = mysqli_query($this->con, "SELECT * FROM users WHERE userName='$un' AND password='$pw'");

            if(mysqli_num_rows($query) == 1) {
                return true;
            } else {
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
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
                return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
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

        private function insertUserDetails($un, $fn, $ln, $em, $pw) {
            // encryption method md5 instead of sha
            $encryptedPw = md5($pw);
            $profilePic = "assets/images/profile-pics/profile";
            $date = date("Y-m-d");

            // these parameters match up with columns in our database
            // have to have single quotes around variables, commas after and enclosing ()
            $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");

            return $result;
        }

        private function validateUserName($username) {
            // echo 'echo';
            if(strlen($username) > 25 || strlen($username) < 5) {
                array_push($this->errorArray, Constants::$userNameCharacters);
                return;
            }

            // check if it doesn't already exsist
            $checkUserNameQuery = mysqli_query($this->con, "SELECT userName FROM users WHERE userName='$username'");
            if(mysqli_num_rows($checkUserNameQuery) != 0) {
                array_push($this->errorArray, Constants::$userNameTaken);
                return;
            }

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
            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0) {
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
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