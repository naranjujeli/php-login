<?php
    class Hashing {
        // DONE
        public static function hash_password($password) {
            return md5($password);
        }
    
        // DONE
        public static function get_random_salt() {
            return substr(md5(rand()), 0, 6);
        }
    }

?>