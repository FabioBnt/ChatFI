<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* minimalisit design */
        body {
          background-color: #f5f5f5;
        }
        .card {
          border: none;
          border-radius: 0;
          box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 2px 3px rgba(0, 0, 0, 0.2);
        }
        .card-header {
          background-color: #fff;
          border-bottom: none;
        }
        .card-body {
          padding: 2rem;
        }
        .form-control {
          border-radius: 0;
          box-shadow: none;
          border-color: #dfe3e8;
        }
        .form-control:focus {
          border-color: #80bdff;
          box-shadow: none;
        }
    </style>
    <script>
        /*Ajouter une page de connexion d’un utilisateur plutôt qu’un simple champ de pseudo sur
        l’interface, et afficher la liste des utilisateurs connectés ; vous pouvez également vous poser la
        question de la gestion des déconnexions...*/
        $(document).ready(function(){
            $("#login").click(function(){
                var username = $("#username-input").val();
                var password = $("#password-input").val();
                $.ajax({
                    url: "../controllers/login.php",
                    type: "POST",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data){
                        if(data == "success"){
                            // a stylish transition
                            $(".container").fadeOut(500, function(){
                                $(this).remove();
                            });
                            // load the chat
                            $("#chat").load("view.php");
                        }else{
                            alert("utilisateur ou mot de passe incorrect");
                        }
                    }
                });
                    
            });
        });
    </script>
  </head>
  <body>
    <!-- title -->
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-sm-8 col-md-6 col-lg-4">
          <h1 class="text-center">ChatFI</h1>
        </div>
      </div>
    </div>
    <!-- login form -->
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-sm-8 col-md-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Se connecter</h4>
              <form>
                <div class="form-group">
                  <label for="username-input">Nom d'utilisateur :</label>
                  <input type="text" class="form-control" id="username-input" required>
                </div>
                <div class="form-group">
                  <label for="password-input">Mot de passe :</label>
                  <input type="password" class="form-control" id="password-input" required>
                </div>
                <button type="submit" id="login" class="btn btn-primary">Se connecter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
