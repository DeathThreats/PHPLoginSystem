<?php

// Delete sessions, 
session_start();
session_unset();
session_destroy();
header("Location: ../signin.php");