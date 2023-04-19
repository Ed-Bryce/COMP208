<?php
    require "includes/loginSession.php";
    require "includes/dbConnection.php";
    $id = $_SESSION["userID"];
    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling/styling.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Chess Game - Friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- NAVIGATION BAR ######################################### -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container justify-content-start">
            <button type="button" class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#menu">Menu</button>
            <ul class="navbar-nav pl-3">
                <li class="nav-item">
                    <a class="nav-link" href="board.php?id=<?=$id?>">Play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="social.php?id=<?=$id?>">Friends</a>
                </li>
            </ul>
        </div>
        <div class="container-fluid justify-content-center">
            <span class="navbar-brand">Chess Game - Player: <?=$id?></span>
        </div>
        <div class="container justify-content-end">
            <a href="login.php" class="btn btn-danger" role="button"><span style="color:#fff;">Logout</span></a>
        </div>
    </nav>

    <!-- body -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
    <h3>Friend Request Out</h3>
    <form method="post" action="social.php">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="input-group mb-3">
            <input type="text" name="reqout" class="form-control" placeholder="New friend">
            <button type="submit" class="btn btn-primary">SEND</button>
        </div>
    </form>
    <!--SEND FRIEND REQUEST-->
    <?php
        if (!empty($_POST["reqout"])) {
            $reqout = $_POST["reqout"];

            //CONNECT TO DB
            $stmt = mysqli_stmt_init($conn);
            //GET USER IDS
            $sql = "SELECT userID FROM chessdb.Users WHERE username = ?;";
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "s", $reqout);
            mysqli_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $friendId = $row["userID"];

            //TODO: CHECK THAT ARNTS ALREADY FRIENDS
            //TODO: CHECK THAT REQUEST DOESNT ALREADY EXIT (BOTH WAYS)

            //SEND FRIEND REQUESTS
            $sql = "INSERT INTO chessdb.FriendRequests (from_user, to_user) VALUE (?, ?);";
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $id, $friendId);
            mysqli_execute($stmt);      
        }
        ?>    
    <hr>
    <h3>Friend Requests In</h3>
    <table>
        <?php 
                //GET INCOMING REQUESTS FROM DB
                $stmt = mysqli_stmt_init($conn);
                $sql = "SELECT username, userID 
                        FROM chessdb.Users, chessdb.FriendRequests 
                        WHERE chessdb.FriendRequests.to_user = ? AND chessdb.Users.userID = chessdb.FriendRequests.from_user;";
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_execute($stmt);
                $results = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($results)) {
                    $friendReqId = $row["userID"];
                    $yes = True;
                    $no = False;
                    echo "<p>" . $row["username"] . " <a href='social.php?accept=$yes&friendReqId=$friendReqId'>YES</a> <a href='social.php?accept=$no&friendReqId=$friendReqId'>NO</a> <p>";
                }

                //RESPONSE
                
                if(isset($_GET['accept']) && isset($_GET['friendReqId']))
                {
                    $RespAns = $_GET["accept"];
                    $RespId = $_GET["friendReqId"];
                    //ACCEPT
                    if ($RespAns == True)
                    {
                        //ADD TO DB
                        $sql = "INSERT INTO chessdb.Friends (userID_1, userID_2) VALUES (?,?);";
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_bind_param($stmt, "ii", $id, $RespId);
                        mysqli_execute($stmt);
                    }
                    //REMOVE FROM FRIEND REQUESTS
                    $sql = "DELETE FROM FriendRequests WHERE (to_user = ? AND from_user = ?) OR (to_user = ? AND from_user = ?);";
                        mysqli_stmt_prepare($stmt, $sql);   
                        mysqli_stmt_bind_param($stmt, "iiii", $id, $RespId, $RespId, $id);
                        mysqli_execute($stmt);
                        //RESET URL
                    Header("Location: social.php");
                }
                
            ?>
    </table>
    </div>
    </div>

    <div class="col-lg-4 mb-4">
    <div class="card">
        <h3>Friends List</h3>
            <table>
                <!-- GET FRIENDS LIST FROM DB -->
                <?php
                    $stmt = mysqli_stmt_init($conn);
                    $sql = "SELECT userID, username
                    FROM chessdb.Friends, chessdb.Users
                    WHERE (chessdb.Friends.userID_1 = ? OR chessdb.Friends.userID_2 = ?) 
                    AND (chessdb.Users.userID = chessdb.Friends.userID_1 OR chessdb.Users.userID = chessdb.Friends.userID_2);";
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "ii", $id, $id);
                    mysqli_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    //LOOP THROUGH REQUESTS AND DISPLAY
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        if ($row["userID"] != $id) {
                            $friendId = $row["userID"];
                            $friendUsername = $row["username"];
                            $_SESSION["friendID"] = $friendId;
                            echo "<p><a href='social.php?friend=$friendUsername&id=$friendId'>".$friendUsername."</a></p>";
                        }
                    }
                ?>
            </table>
        </div>
    </table>
    </div>
    </div>

    <div class="col-lg-4 mb-4">
    <div class="card">
    <h3>Chat with friends</h3>
    <?php
                $friend=$_GET["friend"];
                $friendID = $_GET["id"]
            ?>
    <form method="post" action="includes/sendMessage.php">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="input-group mb-3">
            <input type="text" name="chatfriend" class="form-control" placeholder="Friend" value=<?=$friendUsername?>>
            <button type="button" class="btn btn-primary" onClick="location.href='social.php?id=<?=$id?>&p=<?=$get?>'">To Game</button>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="textbox" placeholder="Enter email" name="textbox" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">SEND</button>
    </form>
    <?php //SEND MESSAGE (moved to own file -> sendMessage.php)

                //DISPLAY MESSSAGES (moved to own file -> getMessages.php)
                include "includes/getMessages.php";
                    
            ?>
    <iframe width="100%" height="500" src="chat.php?id=$id&id=<?=$id?>" title="chats" frameBorder="1"></iframe>
    </div>
    </div>
    </div>
    </div>

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start" id="menu">
    <div class="offcanvas-header">
    <!-- sidebar header -->
    <h1 class="offcanvas-title">Menu</h1>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
    <!-- sidebar body -->
    </div>
    </div>

    </body>
    </html>

