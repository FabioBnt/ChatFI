<?php
//Développer une page afficher.php qui fournit l’interface de l’application
//Le comportement de votre interface sera géré par JQuery
//Lors du click sur le bouton Envoyer, votre application doit générer l’appel Ajax à la page
//save.php en utilisant la bibliothèque Jquery
// Créer une routine de rafraîchissement des messages qui s’exécute régulièrement (toutes les deux
//secondes par exemple). à chaque appel, cette routine récupère les nouveaux messages par l’appel du
//script get.php. Elle met ensuite à jour la zone des messages postés.
//Note : utiliser la fonction Javascript setInterval et la fonction Jquery load
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatFI</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#send").click(function() {
                let author = $("#author").val();
                let content = $("#content").val();
                $.ajax({
                    url: "models/save.php",
                    type: "GET",
                    success: function() {
                        $("#author").val("");
                        $("#content").val("");
                    }
                });
            });
            setInterval(function() {
                $("#messages").load("models/get.php");
            }, 2000);
        });
    </script>
</head>
<body>
<div id="messages"></div>
<input type="text" id="author" placeholder="Author">
<input type="text" id="content" placeholder="Content">
<button id="send">Send</button>
</body>
</html>