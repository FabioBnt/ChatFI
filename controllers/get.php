<?php
/* Développer un script PHP recuperer.php permettant l’obtention des 10 derniers messages contenus
dans la table chat. */

include_once("..\models\chat.php");
$model = new chat();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
try {
    if (empty($_GET["new"])) {
        if (isset($_SESSION["last"])) {
            $n = $_SESSION["last"];
        } else {
            $n = 10;
        }
        $messages = $model->selectNLatest($n);
    } else {
        $n = intval($_GET["new"]) + 10;
        $messages = $model->selectNLatest($n);
        $_SESSION["last"] = $n;
    }
    //use the messages to fill in the chats variable
    $chats = "<div class='chat active-chat' data-chat='person1'>";
// make a color for each author
    $colors = array();
    if(!isset($_SESSION["user"])) {
        $_SESSION["user"] = "Anonymous";
    }
    foreach ($messages as $message) {
        // if the author is not in the colors array, add it
        if (!array_key_exists($message["author"], $colors)) {
            // generate a fix dark color using the author name
            $colors[$message["author"]] = "#" . substr(md5($message["author"]), 0, 3);
        }
        $message["color"] = $colors[$message["author"]];
        // if the message is from the user
        $chats .= "<div class='conversation-start'>
        <span>" . $message["timestamp"] . "</span>
    </div>";
        if ($message["author"] === $_SESSION["user"]) {
            // show the name of the author
            $chats .="<div class='bubble me'>";
        } else {
            $chats .= "<div class='bubble you'>";
        }
        $chats .= "<label style='color: " . $message["color"] . "'>" . $message["author"] . "</label>" . "<br/>";
        $chats .= $message["content"] . "</div>";

    }
    $chats .= "</div>";
    echo $chats;
} catch (Exception $e) {
    echo $e->getMessage();
}

?>