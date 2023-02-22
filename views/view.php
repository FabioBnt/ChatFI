<?php
//Développer une page afficher.php qui fournit l’interface de l’application
//Le comportement de votre interface sera géré par JQuery
//Lors du click sur le bouton send, votre application doit générer l’appel Ajax à la page
//save.php en utilisant la bibliothèque Jquery
// Créer une routine de rafraîchissement des contents qui s’exécute régulièrement (toutes les deux
//secondes par exemple). à chaque appel, cette routine récupère les nouveaux contents par l’appel du
//script get.php. Elle met ensuite à jour la zone des contents postés.
//Note : utiliser la fonction Javascript setInterval et la fonction Jquery load

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
    <meta charset="utf8mb4">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // When clicking on the send button
            $("#send").click(function() {
                // Retrieve the form data
                var name = $("#name").val();
                var content = $("#content").val();
                // Send the data using get to save.php
                $.ajax({
                    url: "../models/save.php",
                    method: "GET",
                    data: {
                        author: name,
                        content: content
                    },
                    success: function() {
                        // Clear the form
                        $("#name").val("");
                        $("#content").val("");
                    }
                });
            });

            // Refresh the contents every 2 seconds
            setInterval(function() {
                // save the data from get.php
                // Retrieve the data from get.php
                $.ajax({
                    url: "../models/get.php",
                    method: "GET",
                    success: function(data) {
                        // Decode the data
                        // Display the data
                        $("#contents").html(data);
                    }
                });
            }, 2000);
        });
    </script>
</head>

<body>
    <h1>Application Ajax</h1>
    <form>
        <label for="name">name :</label>
        <input type="text" id="name" name="name"><br>
        <label for="content">content :</label>
        <textarea id="content" name="content"></textarea><br>
        <button type="button" id="send">send</button>
    </form>
    <div id="contents"></div>
</body>

</html>