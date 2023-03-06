$(document).ready(function() {
    // Todo : load rooms
    //$('#rooms').load('../controllers/rooms.php');

    // Set active person
    let rooms = {
        list: document.querySelector('ul.people'),
        all: document.querySelectorAll('.left .person'),
        name: '' };
    function setActivePerson(f) {
        rooms.list.querySelector('.active').classList.remove('active');
        f.classList.add('active');
        rooms.name = f.querySelector('.name').innerText;
    }
    rooms.all.forEach(f => {
        f.addEventListener('mousedown', () => {
            f.classList.contains('active') || setActivePerson(f);
        });
    });

    // Scroll to the bottom of the right class div
    function scrollToBottom() {
        let chat = document.getElementsByClassName('right')[0];
        chat.scrollTop = chat.scrollHeight;
    }
    // load chat once to scroll to bottom
    $('#chat').load('../controllers/get.php', scrollToBottom);

    // Function to send message via AJAX
    function sendMessage() {
        let name = $('#name').val();
        let content = $('#content').val();
        $.ajax({
            url: '../controllers/save.php',
            type: 'GET',
            data: {
                author: name,
                content: content
            },
            success: function(data) {
                $('#content').val('');
                $('#chat').load('../controllers/get.php', scrollToBottom);
                // if there is an error, show error message TODO: fix
                alert(data);
                if(data == 'error') {
                    // show error message in id="error" element then hide it after 3 seconds
                    $('#error').html(data).show().delay(3000).fadeOut();
                }
            }
        });
    }

    // Send message when "send" button is clicked
    $('#send').click(function() {
        sendMessage();
    });

    // Send message when "enter" key is pressed in content field or TODO: link that contains "send" class
    $('#content').keypress(function(e) {
        if (e.which == 13 && !e.shiftKey) {
            sendMessage();
            return false;
        }
    });

    // Refresh contents every 2 seconds
    setInterval(function() {
        $('#chat').load('../controllers/get.php');
        console.log("refreshed");
    }, 2000);

});