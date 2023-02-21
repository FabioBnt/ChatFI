<?php
/* Développer un script PHP recuperer.php permettant l’obtention des 10 derniers messages contenus
dans la table chat. */

include_once("model.php");
$model = new model("chat");
$messages = $model->selectNLatest(10);
// send a json response
echo json_encode($messages);
?>