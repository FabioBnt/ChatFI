<?php
/* Développer un script PHP recuperer.php permettant l’obtention des 10 derniers messages contenus
dans la table chat. */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../models/model.php");
$model = new model("chat");
$messages = $model->selectNLatest(10);
//use the messages to fill in the chats variable
$chats = "<div class='chat active-chat' data-chat='person1'>";
// make a color for each author
$colors = array();
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
    if ($message["author"] == "user") {
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
?>