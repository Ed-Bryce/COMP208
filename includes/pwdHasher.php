<?php
    $password = "testing";
    $hash = password_hash($password, PASSWORD_DEFAULT);
    echo "<p>" . $password ." goes to: " . $hash . "</p>";

    if (password_verify($password, $hash)) {
        exit;
    }else{
        echo 'Hash Gen Incorrect';
        exit;
                }
?>