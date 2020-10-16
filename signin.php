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
    <title>Sign in</title>
    <!-- External cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta name="theme-color" content="#232a8c">
    <!-- End -->
    <link rel="stylesheet" href="/css/signin.css">
</head>
<body>
    <div class="content">
        <?php
            if(isset($_GET['error']) && $_GET['error'] == 'password'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Incorrect password, please try again</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'user'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>User not found, please try again</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'username%password'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid username or password, please try again</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'emptyfields'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>All fields are required, please try again</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['r']) && $_GET['r'] == 'success'){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>User successfully created, please sign in</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
            else if(isset($_GET['error']) && $_GET['error'] == 'true'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops! Something went wrong, please try again</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
        ?>
        <form action="/auth/signin_auth.php" method="POST" autocomplete="on">
            <p class="header">Sign in</p>
            <div class="containers">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/></svg>
                <input type="text" class="username" name="username" placeholder="username" pattern="[a-zA-Z0-9 ]+" required title="LowerCase Letters and Numbers only" />
            </div>
            <div class="containers">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-key" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/><path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>
                <input type="password" class="password" name="password" placeholder="password" pattern="[a-zA-Z0-9 ]+" required title="Letters and Numbers only" />
            </div>
            <button type="submit" name="submit" value="submit" id="submit" title="Submit">Sign in <svg style="margin-left:.3rem" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/><path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg></button><br>
            <h4>Not yet registered? <a href="signup.php" title="Sign up"> Sign up </a></h4>
        </form>
    </div>
    <p class="developed">Developed by Augustin Nalzaro</p>
</body>
</html> 