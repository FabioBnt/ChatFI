<?php
/* Développer un script PHP recuperer.php permettant l’obtention des 10 derniers messages contenus
dans la table chat. */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("model.php");
$model = new model("chat");
$messages = $model->selectNLatest(10);
// send a json response
try {
    header('Content-Type: application/json; charset=utf8mb4');
    echo json_encode($messages, JSON_THROW_ON_ERROR, true);
} catch (JsonException $e) {
}

?>