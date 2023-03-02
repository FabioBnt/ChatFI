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
foreach ($messages as $message) {
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
    $chats .= $message['author']. ' : '. $message["content"] . "</div>";
}
$chats .= "</div>";
echo $chats;
?>