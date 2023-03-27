<?php
    require "dbConnection.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM chessdb.users WHERE email=?;";
    echo "<p>" . $email . "</p>";
    $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "<p> statement error </p>";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                echo "<p>" . $row["password"];
                echo "<p>" . $password . "</p>";
                if (password_verify($password, $row["password"])) {
                    echo 'Password is valid!';
                    $_SESSION["logged_in"] = "true";
                    $_SESSION["failed"] = "false";
                    header("Location: ../board.php");
                    exit;
                }
                else{
                    echo 'Invalid password.';
                    $_SESSION["failed"] = "true";
                    header("Location: ../login.php");
                    exit;
                }
            }
            else {
                echo "<p> error - no user </p>";
                $_SESSION["failed"] = "true";
                header("Location: ../login.php");
                exit();
            }
        }
?>