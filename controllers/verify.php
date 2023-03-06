<?php
// ceck if the validity of the username and password
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // get the username and password
    $username = $_POST["username"];
    $password = $_POST["password"];
    // check if the username and password are valid
    // TODO: use a database or a file to store the users
    if ($username == "admin" && $password == "\$iutinfo") {
        // start the session
        session_start();
        // set the username in the session
        $_SESSION["username"] = $username;
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