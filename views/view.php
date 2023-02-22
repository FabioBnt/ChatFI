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
<html>

<head>
    <title>ChatFI</title>
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

            // Refresh contents every 2 seconds
            setInterval(function() {
                $('#messages-posted').load('../models/get.php');
                console.log("refreshed");
            }, 2000);
        });
    </script>
</head>

<body>
    <h1>ChatFI</h1>
    <div id="messages-posted"></div>
    <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <label for="content">Message:</label>
        <textarea id="content" name="content"></textarea>
        <button type="button" id="send">Send</button>
    </form>
</body>

</html>