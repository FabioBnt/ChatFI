$(document).ready(function(){
    function verifyLogin(username, password){
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
            if(data === "success"){
                window.location.href = "index.php?page=view";
            }else{
                alert("Nom d'utilisateur ou mot de passe incorrect");
            }
            }
        });
    }
    $("#login").click(function(){
        const username = $("#username-input").val();
        const password = $("#password-input").val();
        if(username === "" || password === ""){
            alert("Veuillez remplir tous les champs");
            return;
        }
        verifyLogin(username, password);
    });
});