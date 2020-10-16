<?php

require_once 'server.php';

$fullname = trim(mysqli_real_escape_string($conn, $_POST['user_fullname']));
$username = strtolower(trim(str_replace(' ', '', mysqli_real_escape_string($conn, $_POST['username'])))); 
$password = trim(str_replace(' ', '', $_POST['password']));
$authkey = trim($_POST['auth']);
$secretkey = 'SecretKey';

if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($fullname) OR empty($username) OR empty($password) OR empty($authkey)) {
        header('Location: /signup.php?error=emptyfields');
        exit();
    }

    else {

        if($authkey == $secretkey){

            if(!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
                header('Location: /signup.php?error=name');
                exit();
            }
            else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                header('Location: /signup.php?error=username');
                exit();
            }
            else if(!preg_match("/^[a-zA-Z0-9]*$/", $password)){
                header('Location: /signup.php?error=password');
                exit();
            } 
            else {
                
                //prepare and bind using object oriented wowowowowow
                $stmt = $conn->prepare("INSERT INTO users (user_fullname, user_name, user_password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $fullname, $username, password_hash($password, PASSWORD_DEFAULT));

                if($stmt->execute()){
                    
                    // Redirect to login page after creating new user
                    header('Location: /signin.php?r=success');

                }

                else {
                    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                }

                $stmt->close();

            }

        } 
        
        else {

            header('Location: /signup.php?error=notAuthorized');
            exit();

        }
            
    }

} 

else {
    header('Location: /signup.php');
    exit();
}