<?php
/*Développer un script PHP enregistrer.php permettant l’enregistrement d’un message dans la table
chat.
Cette page sera invoquée par des requêtes HTTP GET, dans lesquelles au minimum l’auteur ainsi que
le contenu du message seront mentionnés. Par exemple : enregistrer.php?pseudo=toto&phrase=salut
L’estampille horaire devra être fournie par le script PHP, alors que l’identifiant du message sera généré
automatiquement par MySQL.*/

use models\chat;

$model = new chat();
if(!empty($_GET["author"]) && !empty($_GET["content"])) {
    $author = $_GET["author"];
    $content = $_GET["content"];
    $data = array(
        "author" => $author,
        "content" => $content
    );
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
