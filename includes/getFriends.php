<?php
    require "dbConnection.php";
    $sql = "SELECT * FROM chessdb.friends WHERE userID_1 = ? OR userID_2 = ?";
    // idea set userID as session after login
    $userID = $_SESSION["userID"];
    echo "<p>" . $userID . "</p>";
    $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "<p> statement error </p>";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $userID, $userID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                echo "<p>" . $row["relationID"] . "</p>";
                echo "<p>" . $row["userID_1"] . "</p>";
                echo "<p>" . $row["userID_2"] . "</p>";
            }
        }
?>