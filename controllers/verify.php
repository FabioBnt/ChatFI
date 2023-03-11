<?php
// ceck if the validity of the username and password
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    // get the username and password
    $username = $_POST["username"];
    $password = $_POST["password"];
    // check if the username and password are valid
    // TODO: use a database or a file to store the users
    if ($username == "admin" && $password == "\$iutinfo") {
        // start the session if not started
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        // set the username in the session
        $_SESSION["user"] = $username;
        // return success
        echo "success";
    } else {
        // return failure
        echo "failure";
    }
}else {
    // return failure
    echo "failure";
}
