<?php
    session_start();
        //echo "<p>" . $_SESSION["logged_in"] . "</p>";
        if($_SESSION["logged_in"] != "true"){
            header("Location: login.php");
            exit();
        }
?>