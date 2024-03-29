<link rel="stylesheet" href="/front/CSS/chat.css">

{if isset($session.username)}
    <div id="chatContainer">
        <div id="chatBox">
            <p id="messageParagraph">            
            </p>
        </div>
        <input type="text" id="usermsg" placeholder="Type a message" onkeypress="handleKeyPress(event)">
        <button onclick="sendMessage()" name="submitmsg" id="submitmsg">
            Send
        </button>
    </div>

    <script>
    var socket = new WebSocket('ws://localhost:8080');

    socket.onopen = function() {
        console.log('Connected to the WebSocket server.');
    };

    socket.onmessage = function(event) {
        console.log('Received message:', event.data);
        var message = event.data;
        var messageParagraph = document.getElementById('messageParagraph');
        messageParagraph.innerHTML += message + "<br>";
        messageParagraph.scrollTop = messageParagraph.scrollHeight;
    };

    socket.onclose = function() {
        console.log('Disconnected from the WebSocket server.');
    };

    function sendMessage() {
        var message = "{$session.username}" + ": " + document.getElementById('usermsg').value;
        socket.send(message);
        document.getElementById('usermsg').value = '';
    }

    function handleKeyPress(event)
    {
        if (event.keyCode === 13)
        {
            event.preventDefault();
            sendMessage();
        }
    }
    </script>
{/if}