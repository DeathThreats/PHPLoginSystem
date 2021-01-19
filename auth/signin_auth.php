<?php

// Establish Server Connection
require_once 'config.php';

// $_POST['usernameoremail] and $_POST['password'] is referring to the value of the 'name' attribute in the html inputs
// trim() removes whitespaces before and after
$userIdentity = trim($_POST['usernameoremail']);
$password = trim($_POST['password']);

// Checks if user actually submitted the form
if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){

    // This checks if any of the input fields are empty
    if(empty($userIdentity) OR empty($password)) {
        header("Location: ../signin.php?error=emptyfields");
        exit();

    // This checks if submitted characters matches the format provided within the brackets
    // For more options to the search algorithm of preg_macth() visit https://www.php.net/manual/en/function.preg-match.php
    } elseif(!preg_match('/^[a-z0-9@._-]*$/', $userIdentity)) {
        header("Location: ../signin.php?error=username");
        exit();

    } else {

        // Using prepared statement to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR user_email = ? LIMIT 1;"); 
        $stmt->bind_param("ss", $userIdentity, $userIdentity); 
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0) { // checks if user is registered
            if($row = $result->fetch_assoc()){ // fetch data and store in $row, I like to use if statement but it's completely optional
                if(password_verify($password, $row['user_password'])){ // compare input and database password
                    
                    // if signin is a sucess
                    session_start();
                    $_SESSION["id"] = $row['user_id'];
                    $_SESSION["fullname"] = $row['user_fullname'];
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["email"] = $row['user_email'];
                    header("Location: /");
                    $stmt->close();
                    $conn->close();

                } else {
                    header("Location: ../signin.php?error=password");
                    exit();
                }
            } else {
                header("Location: ../signin.php?error=true");
                exit();
            }
        } else {
            header("Location: ../signin.php?error=notfound");
            exit();
        }
    }
} else {
    header("Location: ../signin.php");
    exit();
}