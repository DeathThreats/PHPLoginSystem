<?php
//start session
session_start();

// Check for any started session
if(isset($_SESSION["id"]) && isset($_SESSION['name'])) {
    header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <!-- External cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta name="theme-color" content="#232a8c">
    <!-- End -->
    <link rel="stylesheet" href="/css/signup.css">
</head>
<body>
    <div class="content">
        <?php
            if(isset($_GET['error']) && $_GET['error'] == 'notAuthorized'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Authorization Key is incorrect, please try again</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'emptyfields'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>All fields are required, please try again</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'name'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Full Name must contain Letters only</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'username'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username must contain Letters and Numbers only</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'password'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Password must contain Letters and Numbers only</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
        ?>
        <form action="/auth/signup_auth.php" method="POST" autocomplete="on">
            <p class="header">Sign up</p>
            <div class="containers">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/><path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/></svg>
                <input type="text" name="user_fullname" placeholder="Full Name" required pattern="[a-zA-Z ]+" title="Letters only" />
            </div>
            <div class="containers">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg>
                <input type="text" class="username" autocapitalize="off" name="username" placeholder="Username" required pattern="[a-z0-9]+" title="LowerCase Letters and numbers only" />
            </div>
            <div class="containers">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
                <input type="password" class="password" autocapitalize="off" name="password" placeholder="Password" required pattern="[a-zA-Z0-9]+" title="Letters and Numbers only" />
            </div>
            <div class="containers">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-unlock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/><path fill-rule="evenodd" d="M8.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/></svg>
                <input type="password" class="authkey" autocapitalize="off" name="auth" placeholder="Auth Key" required pattern="[a-zA-Z0-9]+" title="Authorization key for creating accounts">
            </div>
            <button type="submit" name="submit" value="submit" id="submit" title="Submit">Submit <svg style="margin-left:.3rem" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></button><br>
            <h4>Already registered? <a href="signin.php" title="Sign in"> Sign in </a></h4>
        </form>
    </div>
    <p class="developed">Developed by Augustin Nalzaro</p>
</body>
</html>