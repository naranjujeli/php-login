<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/Hashing.php");

    class DataAccess {
        private static function open_connection() {
            return new PDO("mysql:host=localhost;dbname=php_test", getenv("MYSQL_USERNAME"), getenv("MYSQL_PASSWORD"));
        }

        private static function close_connection($connection) {
            $connection = null;
        }

        public static function execute_query($query, $query_params) {
            $mysql_connection = self::open_connection();
            $pdo_statement = $mysql_connection->prepare($query);
            $response = $pdo_statement->execute($query_params);
            self::close_connection($mysql_connection);
            return $pdo_statement->fetchAll(); // fetchAll AAAAAAAAAAAAA
        }

        public static function create_user($username, $password_salt, $password_hash) {
            self::execute_query('INSERT INTO users (Username, PasswordSalt, PasswordHash) VALUES (?, ?, ?);', array($username, $password_salt, $password_hash));
        }
    }
?>