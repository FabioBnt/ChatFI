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
    // Gérer plusieurs salles de messageries, ou chat room. Un utilisateur peut discuter dans plusieurs
    // salles. Pour chacune des salles, afficher les utilisateurs participant à la conversation.
    // Indices : la gestion d’une table de correspondance nomDeSalle/historiqueDesMessages côté
    // Jquery
    /*
    document.querySelector('.chat[data-chat=person2]').classList.add('active-chat');
    document.querySelector('.person[data-chat=person2]').classList.add('active');

    let friends = {
    list: document.querySelector('ul.people'),
    all: document.querySelectorAll('.left .person'),
    name: '' },

    chat = {
    container: document.querySelector('.container .right'),
    current: null,
    person: null,
    name: document.querySelector('.container .right .top .name') };


    friends.all.forEach(f => {
    f.addEventListener('mousedown', () => {
        f.classList.contains('active') || setAciveChat(f);
    });
    });

    function setAciveChat(f) {
    friends.list.querySelector('.active').classList.remove('active');
    f.classList.add('active');
    chat.current = chat.container.querySelector('.active-chat');
    chat.person = f.getAttribute('data-chat');
    chat.current.classList.remove('active-chat');
    chat.container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat');
    friends.name = f.querySelector('.name').innerText;
    chat.name.innerHTML = friends.name;
    }
    --------------------
    document.querySelector('.chat[data-chat=person1]').classList.add('active-chat');
    document.querySelector('.person[data-chat=person1]').classList.add('active');
    let room = 1;
    let rooms = {
        list: document.querySelector('ul.people'),
        all: document.querySelectorAll('.left .person'),
        name: '' };
    function setAciveChat(f) {
        rooms.list.querySelector('.active').classList.remove('active');
        f.classList.add('active');
        chat.current = chat.container.querySelector('.active-chat');
        chat.person = f.getAttribute('data-chat');
        chat.current.classList.remove('active-chat');
        chat.container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat');
        rooms.name = f.querySelector('.name').innerText;
        chat.name.innerHTML = rooms.name;
        //room = 
    } */
    // TODO: Gérer plusieurs salles de messageries, ou chat room. Un utilisateur peut discuter dans plusieurs

    // Refresh contents every 2 seconds
    setInterval(function() {
        $('#chat').load('../controllers/get.php');
        console.log("refreshed");
    }, 2000);

    // Scroll to the bottom of the chat div
    function scrollToBottom() {
        var chat = document.getElementById('chat');
        chat.scrollTop = chat.scrollHeight;
    }
});