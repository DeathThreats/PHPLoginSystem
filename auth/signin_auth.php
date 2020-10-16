<?php

// Create server connection
require_once 'server.php';

$username = strtolower(trim(str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['username']))));
$password = trim(mysqli_real_escape_string($conn, $_POST['password']));


if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($username) or empty($password)) {
        header('Location: /signin.php?error=emptyfields');
        exit();
    }

    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header('Location: /signin.php?error=username%password');
        exit();
    }

    else {

        // Created template of prepared statement
        $sql = "SELECT * FROM users WHERE user_name = ?";
        // Created prepared statement 
        $stmt = mysqli_stmt_init($conn);
        // Check if no error occurs while executing code in db
        if(mysqli_stmt_prepare($stmt, $sql)) {
            // If no error then bind values to placeholders
            mysqli_stmt_bind_param($stmt, "s", $username);
            // Execute binding in db
            mysqli_stmt_execute($stmt);
            // putting results in var
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                $password_check = password_verify($password, $row['user_password']);

                if($password_check == true) {

                    session_start();
                    $_SESSION["name"] = $row['user_fullname'];
                    $_SESSION["user_username"] = $row['user_name'];
                    $_SESSION["id"] = $row['user_id'];
                    $_SESSION["privilege"] = $row['user_privilege'];

                    if(isset($_SESSION["id"]) AND isset($_SESSION['name']) AND isset($_SESSION['user_username'])) {

                        // Redirects to index.php after logging in
                        header("Location: /");
                        exit(); 

                        mysqli_close($conn);

                    }

                    else {
                        header('Location: /signin.php?error=true');
                        exit();
                    }

                }

                else {
                    header('Location: /signin.php?error=password');
                    exit();

                }

            }

            else {
                header('Location: /signin.php?error=user');
                exit();
            }

        }

        else {
            header('Location: /signin.php?error=true');
            exit();
        }

    }

}

else {
    header('Location: /signin.php?error=true');
    exit();
}