<?php

session_start();

if (!isset($_SESSION["id"]) AND !isset($_SESSION["username"])){
    header("Location: ../signin.php");
}

?>

Welcom back <strong><?php echo $_SESSION['fullname'] ?></strong>, you are signed in!👊 ( ͡◣ ‿‿ ͡◢)
<br>
<a href="../logout.php">logout</a>