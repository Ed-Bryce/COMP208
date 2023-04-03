<?php
    session_start();
        if($_SESSION["logged_in"] != "true"){
            header("Location: login.php");
            exit();
        }
?>