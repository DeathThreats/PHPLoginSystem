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
    <form action="../auth/signup_auth.php" method="POST">
        <div>
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" class="user-input" id="username" name="username" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" class="user-input" id="email" name="email" required>
        </div>
        <div>
            <label for="InputPassword">Password</label>
            <input type="password" id="InputPassword" name="password" required>
        </div>
        <div>
            <label for="RePassword">Retype Password</label>
            <input type="password" id="RePassword" name="RePassword" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="/signin.php">Sign In</a>
    <br>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyfields'){
                echo "<h3 style='color:#ff5500'>All fields are required</h3>";
            }if($_GET['error'] == 'name'){
                echo "<h3 style='color:#ff5500'>Full Name must only contain letters</h3>";
            }if($_GET['error'] == 'username'){
                echo "<h3 style='color:#ff5500'>Username must only contain letters and numbers</h3>";
            }if($_GET['error'] == 'email'){
                echo "<h3 style='color:#ff5500'>Invalid email, please try again</h3>";
            }if($_GET['error'] == 'password'){
                echo "<h3 style='color:#ff5500'>Your password didn't match, please try again</h3>";
            }if($_GET['error'] == 'true'){
                echo "<h3 style='color:#ff5500'>Oops! something went wrong, please reload the page</h3>";
            }
        }
    ?>
</body>
</html>