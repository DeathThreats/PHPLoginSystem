<?php
    // Start or resume session
    session_start();

    // Checks and redirects you if you're already Signed in
    if(isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        .user-input {
            text-transform: lowercase;
        }
    </style>
</head>
<body>
    <form action="../auth/signin_auth.php" method="POST">
        <div>
            <label for="identity">Username or Email</label>
            <input type="text" class="user-input" id="identity" name="usernameoremail" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="/signup.php">Sign Up</a>
    <br>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyfields'){
                echo "<h3 style='color:#ff5500'>All fields are required</h3>";
            }if($_GET['error'] == 'username'){
                echo "<h3 style='color:#ff5500'>Invalid Username or Email, please try again</h3>";
            }if($_GET['error'] == 'password'){
                echo "<h3 style='color:#ff5500'>Incorrect password, please try again</h3>";
            }if($_GET['error'] == 'true'){
                echo "<h3 style='color:#ff5500'>Oops! something went wrong, please reload the page</h3>";
            }if($_GET['error'] == 'notfound'){
                echo "<h3 style='color:#ff5500'>User not found, please try again</h3>";
            }
        } elseif(isset($_GET['r']) AND $_GET['r'] == "success"){ // checks for 'response' of success
            echo "<h3 style='color:green'>User registered, please sign in</h3>";
        }
    ?>
</body>
</html>