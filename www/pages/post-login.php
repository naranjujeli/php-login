<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/main.css" />

    <title>Attempting to log in</title>
</head>
<body>
    <main>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/Redirection.php");
            require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/DataAccess.php");
            require_once($_SERVER["DOCUMENT_ROOT"] . "/utilities/DataValidation.php");
            try {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // Check the input to be in conditions
                if (
                    !DataValidation::check_data_length($username, $password) ||
                    !DataValidation::check_special_characters($username)
                ) {
                    throw new Exception();
                }
                
                // Check the input to be correct
                if (
                    !DataValidation::username_exists($username) || 
                    !DataValidation::check_password($username, $password)
                ) {
                    throw new Exception();
                }

                Redirection::go_to_success_page();
            } catch (Exception $e) {
                Redirection::go_to_error_page();
            }
        ?>
    </main>
    
</body>
</html>

<?php
    // try {
    //     $mysql_connection = ;
    //     $pdo_statement = $mysql_connection->prepare("SELECT * FROM users WHERE Username=?;");
    //     $pdo_statement->execute(array($_POST["username"]));
    //     $coso = $pdo_statement->fetch()["Password"];
    //     echo $coso;
    // } catch (Exception $e) {
    //     header("Location: /pages/error.php");
    // }
?>