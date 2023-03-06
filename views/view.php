<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
 <title>ChatFI</title>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../controllers/view.js"></script>
</head>
<body>
<!-- error div color red centered midieum size -->
<div id="error" style="color:red; text-align:center; font-size:medium;"></div>
<div class="wrapper">
    <div class="container">
        <div class="left">
            <div class="top">
                <input type="text" placeholder="Search" />
                <a href="javascript:;" class="search"></a>
            </div>
            <ul class="people" id="room">
                <li class="person active" data-chat="person1">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                    <span class="name">Groupe1</span>
                    <!-- Pour chacune des salles, afficher les utilisateurs participant à la conversation.-->
                    <span class="preview">user1, user2, user3</span>
                    <span class="time">2:09 PM</span>
                </li>
                <li class="person" data-chat="person2">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/john.jpg" alt="" />
                    <span class="name">Groupe2</span>
                    <span class="preview">user1, user2, user3</span>
                    <span class="time">2:09 PM</span>
                </li>
            </ul>
        </div>
        <div class="right"  style="overflow:scroll;">
            <div class="top"><span>From: <span class="name"><input type="text" placeholder="name" id="name" value="loding" /></span></span></div>
            <div id="chat">
            </div>
            <div class="write">
                <a href="javascript:;" class="write-link attach"></a>
                <input type="text" placeholder="message" id="content" />
                <a href="javascript:;" class="write-link smiley"></a>
                <a href="javascript:;" class="write-link send"></a>
            </div>
        </div>
    </div>
</div>
</html>