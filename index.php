<?php
// navigate to the page login if nothing is passed in the url
if (!isset($_GET["page"])) {
    header("Location: index.php?page=login");
}
// get the page
$page = $_GET["page"];
// check if the page is valid
if ($page == "login" || $page == "view") {
    // load the page
    include_once("views/$page.php");
} else {
    // navigate to the page login if the page is not valid
    header("Location: index.php?page=login");
}
?>