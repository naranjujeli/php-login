<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/css/main.css">

    <title>Attempting to sign up</title>
</head>
<body>
    <main>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/Hashing.php");
            require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/Redirection.php");
            require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/DataValidation.php");
            require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/DataAccess.php");
            try {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm-password"];

                // Check the input to be valid
                if (
                    $password != $confirm_password || // TODO: Check from the FrontEnd
                    !DataValidation::check_data_length($username, $password) ||
                    DataValidation::username_exists($username)
                ) {
                    throw new Exception();
                }

                // Salt password and store new user on database
                $password_salt = Hashing::get_random_salt();
                DataAccess::create_user($username, $password_salt, Hashing::hash_password($password . $password_salt));

                Redirection::go_to_success_page();
            } catch (Exception $e) {
                Redirection::go_to_error_page();
            }
        ?>
    </main>
</body>
</html>