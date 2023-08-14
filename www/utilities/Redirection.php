<?php
    class Redirection {
        public static function go_to_success_page() {
            header("Location: /pages/success.php");
        }
        
        public static function go_to_error_page() {
            header("Location: /pages/error.php");
        }
    }
?>