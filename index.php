<?php
// navigate to the page login if nothing is passed in the url
$page = null;
if (!isset($_GET["page"])) {
    $page = "login";

} else {
    $page = $_GET["page"];
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// echo display none div with the session user
if (isset($_SESSION["user"])) {
    echo "<div id='session-user' style='display: none;'>" . $_SESSION["user"] . "</div>";
}
// if page = login then destroy session user
if ($page === "login") {
    if (isset($_SESSION["user"])) {
        unset($_SESSION["user"]);
    }
}
if($page === "view" && !isset($_SESSION["user"])) {
    //redirect to login page
    header("Location: index.php");
}
// check if the page is valid
if ($page === "login" || $page === "view") {
    // load the page	
    require_once("views/$page.html");
}else {
    // load the 404 page
    require_once("views/404.html");
}