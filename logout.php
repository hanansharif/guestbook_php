<?php
    session_start();
    session_destroy();
    // header("Location:error.php");
    header("Location:signin.php");
    exit();
?>