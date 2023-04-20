<?php
session_start();
require "dbConnection.php";

$msgStr = $_POST["textbox"];
$friendId = $_POST["id"];
$friendUsername = $_POST["username"];
$id = $_SESSION["userID"];

$mysqltime = date ('Y-m-d H:i:s');
$stmt = mysqli_stmt_init($conn);
$sql = "INSERT INTO chessdb.Messages (`UserID-From`, `userId-To`, messageContent, dateSent) VALUES (?,?,?,?);";
mysqli_stmt_prepare($stmt, $sql);
$temp = "date";
mysqli_stmt_bind_param($stmt, "iiss", $id, $friendId, $msgStr, $mysqltime);
mysqli_stmt_execute($stmt);

header("Location: ../social.php?friend=$friendUsername&id=$friendId");


?>