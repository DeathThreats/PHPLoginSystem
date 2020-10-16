<?php 
    require 'includes/header.php';

    if($_SESSION["privilege"] == 'admin') {
        require 'admin/admin_content.php';
    } else {
        require 'includes/user_content.php';
    }

    require 'includes/footer.php';