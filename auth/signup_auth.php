<?php

// Establish Server Connection
require 'config.php';

// $_POST['fullname], $_POST['username'], etc. is referring to the value of the 'name' attribute in the html inputs
// trim() removes whitespaces before and after the line
// ucwords() transforms first letters in words to uppercase 
$fullname = trim(ucwords($_POST['fullname']));
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$RePassword = trim($_POST['RePassword']);

// Checks if user actually submitted the form
if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){

    // This checks if any of the input fields are empty
    if(empty($fullname) OR empty($username) OR empty($email) OR empty($password) OR empty($RePassword)) {
        header("Location: ../signup.php?error=emptyfields");
        exit();

    // This checks if submitted characters matches the format provided within the brackets
    // For more options to the search algorithm of preg_macth() visit https://www.php.net/manual/en/function.preg-match.php
    } elseif(!preg_match('/^[a-zA-Z ]*$/', $fullname)) {
        header("Location: ../signup.php?error=name");
        exit();

    } elseif(!preg_match('/^[a-z0-9\s]*$/', $username)) {
        header("Location: ../signup.php?error=username");
        exit();

    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=email");
        exit();

    } elseif($password !== $RePassword){
        header("Location: ../signup.php?error=password");
        exit();

    } else {

        // Adds values into the database using prepared statement
        $stmt = $conn->prepare("INSERT INTO users (user_fullname, username, user_email, user_password) VALUES (?, ?, ?, ?);");
        $stmt->bind_param("ssss", $fullname, $username, $email, password_hash($password, PASSWORD_DEFAULT));
        if($stmt->execute()){
                
            // Redirect to login page after creating new user
            header("Location: ../signin.php?r=success");
            $stmt->close();
            $conn->close();

        } else {
            // checks for SQL error
            header("Location: ../signup.php?error=true");
            exit();
        }
    }
} else {
    header("Location: ../signup.php");
    exit();
}