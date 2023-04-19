<?php
require "includes/loginSession.php";
$id=$_POST["id"];
if(!is_dir($id)){mkdir($id);}
if($id==""){$id=$_GET["id"];}

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
    <?php // NEWFRIEND output requests #########################
    $reqout = $_POST["reqout"];
    if($reqout>""){ // new frend request
        if(is_dir($reqout)){
            $friendsout = file_get_contents("$reqout/reqs.txt");
            file_put_contents("$reqout/reqs.txt", "$id#");
        }
        else{echo "ERROR: $newfriend not in the booking list";}
    }
    ?>
    <hr>
    <h3>Friend Requests In</h3>
    <table>
        <?php // IACOPO's incoming requests #########################
        $reqin=$_GET["name"]; // move to friends
        $answer=$_GET["answer"]; // YES/NO
        $reqs = file_get_contents("$id/reqs.txt");
        $reqs = str_replace("$id/","",$reqs); // no folder trailer
        $reqx = explode("#", $reqs);
        foreach($reqx as $req){ // shows the list of IACOPO's input requests with Y/N buttons
            $rand = rand(1,9999); // to avoid caching
            if($req>""){echo "<tr><td>$req &nbsp; <td><a href='social.php?id=$id&name=$req&answer=yes&r=$rand'>YES</a> &nbsp; <td><a href='social.php?id=$id&name=$req&answer=no&r=$rand'>NO</a><br>";}
        }
        if($reqin>""){ // if request YES/NO is clicked
            $reqs=str_replace("$reqin#", "", "$id/$reqs"); // requested name: deleted if NO and if YES to move it
            file_put_contents("$id/reqs.txt", $reqs); // requests updated without namereq
            if($answer=="yes"){
                $friends=file_get_contents("$id/friends.txt"); // string of FRIENDS
                if(strpos("#$friends",$reqin)<1){ // if name not already in friends
                    $friends = str_replace("$id/","",$friends); // no folder trailer
                    $friends="$reqin#$friends"; // YES = name added before FRIENDS
                    file_put_contents("$id/friends.txt", $friends); // updated friends' list in the ID folder
                }
            }
            $rand = rand(1,9999); header("Refresh: 2; url=social.php?id=$id&r=$rand"); // block caching to show updated lists}
        }
        ?>
    </table>
    </div>
    </div>

    <div class="col-lg-4 mb-4">
    <div class="card">
    <h3>Friends List</h3>
    <table>
        <?php
        $rand = rand(1,9999);
        $back = $_GET["back"];
        $friends = file_get_contents("$id/friends.txt"); // string of FRIENDS
    if($back>""){ // move a friend back into requests
        $friends = str_replace("$back#","",$friends);
            file_put_contents("$id/friends.txt", $friends);
            $reqs = file_get_contents("$id/reqs.txt"); // and insert him back into requests
            if(strpos("#$reqs","#$back#")<1){$reqs.= "$back#";}
            file_put_contents("$id/reqs.txt", $reqs); // requests updated with moved name
            header("Refresh: 2; url=social.php?id=$id&r=$rand");
        }
        if($friends>""){$friendx = explode("#",$friends);}
        foreach($friendx as $friend){
            if($friend>""){
                echo "<div><a href='social.php?id=$id&back=$friend&r=$rand'><b>&#10007;</b></a> &nbsp;"; // move a friend back to request
                echo "<a href='social.php?id=$id&f=$friend'>$friend</a></div><br>"; // GET a FRIEND to CHAT
            }
        }
        ?>
    </table>
    </div>
    </div>

    <div class="col-lg-4 mb-4">
    <div class="card">
    <h3>Chat with friends</h3>
    <?php
    $get=$_GET["f"];
    ?>
    <form method="post" action="social.php">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="input-group mb-3">
            <input type="text" name="chatfriend" class="form-control" placeholder="Friend" value=<?=$get?>>
            <button type="button" class="btn btn-primary" onClick="location.href='social.php?id=<?=$id?>&p=<?=$get?>'">To Game</button>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="text" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">SEND</button>
    </form>
    <?php // messages queue
        $chatfriend = $_POST["chatfriend"];
        if($chatfriend>""){
            $bdws = file_get_contents("badwords.txt"); // check badwords
            $text = $_POST["text"];
            $bdwx = explode("#",$bdws);
            foreach($bdwx as $bdw){
                $str1 = strtolower("#$text");
                $str2 = strtolower($bdw);
                if(strpos($str1,$str2)>0){$text = str_replace($bdw, "...",$str1);}
            }
            $msgs = file_get_contents("$id/msgs.txt");
            file_put_contents("$id/msgs.txt", "$chatfriend >> $text <br> $msgs");
        }
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

