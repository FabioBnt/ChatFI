<?php
include_once "..\models\user.php";
// check if the validity of the username and password
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    // get the username and password
    $username = $_POST["username"];
    $password = $_POST["password"];
    // check if the user exists
    $db = new user();
    $res = $db->selectUser($username, $password);

    if (!empty($res)) {
        // start the session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // set the username in the session
        $_SESSION["user"] = $username;
        // return success
        echo "success";
    } else {
        // return failure
        echo "failure";
    }
} else {
    // return failure
    echo "failure";
}
