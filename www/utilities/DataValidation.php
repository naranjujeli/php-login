<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/DataAccess.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/Hashing.php");

    class DataValidation {
        public static function check_data_length($username, $password) {
            $username_length = strlen($username);
            if ($username_length == 0 || $username_length > 20) {
                return false;
            }
            $password_length = strlen($password);
            if ($password_length == 0 || $password_length > 20) {
                return false;
            }
            return true;
        }

        public static function check_special_characters($username) {
            if (preg_match('/[\W]/', $username)) {
                return false;
            }
            return true;
        }

        public static function username_exists($username) {
            $result = DataAccess::execute_query('SELECT Username FROM users WHERE Username=?', array($username));
            if (empty($result)) {
                return false;
            }
            return true;
        }

        // Checks the provided password is correct for that username
        public static function check_password($username, $password) {
            $result = DataAccess::execute_query('SELECT PasswordSalt, PasswordHash FROM users WHERE Username=?', array($username));
            if (Hashing::hash_password($password . $result[0]["PasswordSalt"]) == $result[0]["PasswordHash"]) {
                return true;
            }
            return false;
        }
    }
?>