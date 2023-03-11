<?php
// navigate to the page login if nothing is passed in the url
$page = null;
if (!isset($_GET["page"])) {
    $page = "login";
} else {
    $page = $_GET["page"];
}
if (session_status() == PHP_SESSION_NONE)
    session_start();
// check if the user is logged in
if (!empty($_SESSION["user"])) {
    // navigate to the page view
    $page = "view";
}
// check if the page is valid
if ($page == "login" || $page == "view") {
    // load the page	
    require_once("views/$page.html");
}
?>