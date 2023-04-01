$(document).ready(function() {
    // numeber of new messages
    let newMessages = 0;
    // change id user to name user from session user
    $('#user').html($('#session-user').text());
    // name of the user in the chat
    $('#name').val($('#session-user').text());

    // if admin 
    if($('#session-user').text() !== 'admin') {
        // set the #name input field to readonly
        $('#name').prop('readonly', true);
    }

    // Scroll to the bottom of the right class div
    function scrollToBottom() {
        let chat = document.getElementsByClassName('right')[0];
        chat.scrollTop = chat.scrollHeight;
    }

    // if arrow is clicked
    $('#arrow').click(function() {
        scrollToBottom();
    });
    
    // load chat once to scroll to bottom
    $('#chat').load("controllers/get.php", scrollToBottom);

    function addSmiley() {
        // adds a smiley emoji to the content field
        $('#content').val($('#content').val() + '😀');
    }

    // if smiley is clicked
    $('#smiley').click(function() {
        addSmiley();
    });

    // Function to send message via AJAX
    function sendMessage() {
        event.preventDefault();
        let name = $('#name').val();
        let content = $('#content').val();
        // avoid duplicate messages
        $.ajax({
            url: 'controllers/save.php',
            type: 'GET',
            data: {
                author: name,
                content: content
            },
            success: function(data) {
                $('#content').val('');
                $('#chat').load('controllers/get.php');
                if(data === 'error') {
                    // show error that the message must have content in id="error" element then hide it after 3 seconds
                    $('#error').text("Le message doit avoir du contenu").show().delay(3000).fadeOut();
                }
                else if(data === 'duplicate') {
                    // show success message in id="success" element then hide it after 3 seconds
                    $('#error').text("Le message est un doublon").show().delay(3000).fadeOut();
                }else{
                    // add 1 to the number of new messages
                    newMessages++;
                    scrollToBottom();
                }
            }
        });
    }

    // Send message when "send" link is clicked
    $('#send').click(function() {
        sendMessage();
    });

    // Send message when "enter" key is pressed in content field
    $('#content').keypress(function(e) {
        if (e.which === 13 && !e.shiftKey) {
            sendMessage();
            return false;
        }
    });

    // Refresh contents every 2 seconds
    setInterval(function() {
        // chat class charge the messages the last 10 messages and + 1 every message is sent
        $('#chat').load('controllers/get.php?new='+newMessages);
        // preview class charge the names of the users in the chat
        $('#names').load('controllers/names.php');
        console.log("refreshed");
    }, 2000);

    // Logout
    $('#logout').click(function() {
        sessionStorage.removeItem('user');
        sessionStorage.clear();
        window.location.href = "index.php";
    });
});