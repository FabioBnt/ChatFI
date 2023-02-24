<?php
//Développer une page afficher.php qui fournit l’interface de l’application
//Le comportement de votre interface sera géré par JQuery
//Lors du click sur le bouton send, votre application doit générer l’appel Ajax à la page
//save.php en utilisant la bibliothèque Jquery
// Créer une routine de rafraîchissement des contents qui s’exécute régulièrement (toutes les deux
//secondes par exemple). à chaque appel, cette routine récupère les nouveaux contents par l’appel du
//script get.php. Elle met ensuite à jour la zone des contents postés.
//Note : utiliser la fonction Javascript setInterval et la fonction Jquery load

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!-- Développer une page afficher.php qui fournit l’interface de l’application !-->
<!-- Le comportement de votre interface sera géré par JQuery !-->
<!-- Lors du click sur le bouton send, votre application doit générer l’appel Ajax à la page !-->
<!-- save.php en utilisant la bibliothèque Jquery !-->
<!-- Créer une routine de rafraîchissement des contents qui s’exécute régulièrement (toutes les deux !-->
<!-- Secondes par exemple). à chaque appel, cette routine récupère les nouveaux contents par l’appel de !-->
<!-- Script get.php. Elle met ensuite à jour la zone des contents postés. !-->
<!-- Note : utiliser la fonction Javascript setInterval et la fonction Jquery load !-->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
 <title>ChatFI</title>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to send message via AJAX
            function sendMessage() {
                var name = $('#name').val();
                var content = $('#content').val();
                $.ajax({
                    url: '../models/save.php',
                    type: 'GET',
                    data: {
                        author: name,
                        content: content
                    },
                    success: function() {
                        $("#name").val('');
                        $('#content').val('');
                    }
                });
            }

            // Send message when "send" button is clicked
            $('#send').click(function() {
                sendMessage();
            });

            // Send message when "enter" key is pressed in content field
            $('#content').keypress(function(e) {
                if (e.which == 13 && !e.shiftKey) {
                    sendMessage();
                    return false;
                }
            });
            // at the start and once the page loaded load ../controllers/get.php once
            $('#chat').load('../controllers/get.php');

            // Refresh contents every 2 seconds
            setInterval(function() {
                $('#chat').load('../controllers/get.php');
                console.log("refreshed");
            }, 2000);
        });
    </script>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
    <div class="container">
        <div class="left">
            <div class="top">
                <input type="text" placeholder="Search" />
                <a href="javascript:;" class="search"></a>
            </div>
            <ul class="people">
                <li class="person" data-chat="person1">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                    <span class="name" id="name">Thomas Bangalter</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">I was wondering...</span>
                </li>
            </ul>
        </div>
        <div class="right"  style="overflow:scroll;">
            <div id="chat">
            <div class="top"><span>To: <span class="name">loding..</span></span></div>
            </div>
            <!-- make fixed in the bottom of the parent div -->
            <div class="write">
                <a href="javascript:;" class="write-link attach"></a>
                <input type="text" placeholder="name" id="name" />
                <input type="text" placeholder="message" id="content" />
                <a href="javascript:;" class="write-link smiley"></a>
                <a href="javascript:;" class="write-link send"></a>
            </div>
        </div>
    </div>
</div>
</html>