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

<!-- Développer une page afficher.php qui fournit l’interface de l’application !-->
<!-- Le comportement de votre interface sera géré par JQuery !-->
<!-- Lors du click sur le bouton Envoyer, votre application doit générer l’appel Ajax à la page !-->
<!-- save.php en utilisant la bibliothèque Jquery !-->
<!-- Créer une routine de rafraîchissement des messages qui s’exécute régulièrement (toutes les deux !-->
<!-- Secondes par exemple). à chaque appel, cette routine récupère les nouveaux messages par l’appel de !-->
<!-- Script get.php. Elle met ensuite à jour la zone des messages postés. !-->
<!-- Note : utiliser la fonction Javascript setInterval et la fonction Jquery load !-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mini Chat</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../controllers/script.js"></script>
</head>
<body>
    <div id="container">
        <div id="chat">
            <div id="chat-title">
                <h1>Mini Chat</h1>
            </div>
            <div id="chat-content">
                <div id="chat-content-messages">
                    <div id="chat-content-messages-content">
                        <div id="chat-content-messages-content-message">
                            <div id="chat-content-messages-content-message-user">
                                <p>Utilisateur</p>
                            </div>
                            <div id="chat-content-messages-content-message-content">
                                <p>Message</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chat-content-form">
                    <form id="chat-content-form-form" action="../controllers/save.php" method="post">
                        <input id="chat-content-form-form-input" type="text" name="message" placeholder="Votre message">
                        <input id="chat-content-form-form-submit" type="submit" name="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>