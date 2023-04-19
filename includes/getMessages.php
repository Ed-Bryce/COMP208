<?php
require "dbConnection.php";

$friendId = $_SESSION["friendID"];
$id = $_SESSION["userID"];

echo "<p>" . $friendId . "</p>";
echo "<p>" . $id . "</p>";

$stmt = mysqli_stmt_init($conn);
$sql = "SELECT * 
        FROM chessdb.Messages 
        WHERE (`UserID-From` = ? and `UserID-To` = ?) or (`UserID-From` = ? and `UserID-To` = ?)
        ORDER BY dateSent;";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "iiii", $id, $friendID, $friendID, $id);
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($results))
    {
                       
        //display chat
        echo "<p>" . $row["dateSent"] . " : " . $row["messageContent"] . "</p>";
    }