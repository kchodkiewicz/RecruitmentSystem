<?php
require_once "php/connect.php";
require_once "php/chat.php";
if ((isset($_GET['aid'])) && (isset($_GET['uid']))){
    getUserName($_GET['aid'], $_GET['uid']);
}

try{
    if (isset($_GET['aid'])) {
        if (isset($_POST['topic'])){
            require_once "php/AddStage.php";
            if (isset($_GET['uid'])){
                getUserName($_GET['aid'], $_GET['uid']);
            }
            $stage = new AddStage($host, $db_user, $db_pass, $db_name);
            $name = $_POST['topic'];
            $notes = $_POST['notes'];
            $stage->add($_GET['aid'], $name, $notes);}
    } else {
        throw new Exception("Couldn't resolve _GET parameter");
    }
} catch (Exception $e){
    require_once "php/addError.php";
    addError($e);
    echo "<div class='server-error'>Server error! Please try again later. Err: ".$e."</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recruitment System - Add recruitment stage</title>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="/font/stylesheet.css" type="text/css" charset="utf-8" />
</head>
<body>
    <nav>
        <div class="nav-bar">
            <div class="logo-nav">myCompany</div>
            <ul class="nav-links">
                <li id="menu">Menu</li>
            </ul>
            <div id="btn-burger" class="btn-nav">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </div>
        <div id="nav-help"></div>
    </nav>
    <div id="container">
        <form action="" method="post">
        <div class="small-title"></div>
            <div class="message-wrapper">
                <div class="form-row">
                    <label for="stage">Stage</label>
                    <input type="text" name="topic" class="msg-topic" value="" placeholder="e.g. Job interview">
                    <div class="underline"></div>
                </div>
                <div class="form-row">
                    <label for="notes">Notes</label>
                    <textarea name="notes" placeholder="Type your notes here.."></textarea>
                    <div class="underlineTA"></div>
                </div>
            </div>
            
        </form>

    </div>
</body>

<script src="script/burger.js"></script>
<script src="script/main.js"></script>
<script src="script/userRecognizer.js"></script>
<script src="script/addStage.js"></script>
<script src="script/loadAddStage.js"></script>

</html>