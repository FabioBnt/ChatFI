<?php
/*Développer un script PHP enregistrer.php permettant l’enregistrement d’un message dans la table
chat.
Cette page sera invoquée par des requêtes HTTP GET, dans lesquelles au minimum l’auteur ainsi que
le contenu du message seront mentionnés. Par exemple : enregistrer.php?pseudo=toto&phrase=salut
L’estampille horaire devra être fournie par le script PHP, alors que l’identifiant du message sera généré
automatiquement par MySQL.*/
include_once("../models/chat.php");

$model = new chat();
if(!empty($_GET["author"]) && !empty($_GET["content"])) {
    $author = $_GET["author"];
    $content = $_GET["content"];
    $data = array(
        "author" => $author,
        "content" => $content
    );
    // get the last line of the table
    $last = $model->selectNLatest(1);
    // if the content and auther are the same as the last line, don't insert
    if ($last[0]["content"] === $content && $last[0]["author"] === $author) {
        // ajax success
        echo "duplicate";
        return;
    }
    $res = $model->insert($data);
    if ($res) {
        // ajax success
        echo "success";

    } else {
        // ajax error
        echo "error";
    }
}else{
    // ajax error
    echo "error";
}
