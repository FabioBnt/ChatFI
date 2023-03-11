$(document).ready(function(){
    function verfiyLogin(username, password){
        event.preventDefault();
        $.ajax({
            url: 'controllers/verify.php',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(data){
            $('#username-input').val("");
            $('#password-input').val("");
            if(data == "success"){
                window.location.href = "index.php?page=view";
            }else{
                alert("Nom d'utilisateur ou mot de passe incorrect");
            }
            }
        });
    }
    $("#login").click(function(){
        var username = $("#username-input").val();
        var password = $("#password-input").val();
        if(username == "" || password == ""){
            alert("Veuillez remplir tous les champs");
            return;
        }
        verfiyLogin(username, password);
        return;
    });
});