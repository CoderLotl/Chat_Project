<?php
/* Smarty version 4.3.1, created on 2023-07-05 00:48:33
  from 'C:\xampp\htdocs\Chat_Project\lib\tpl\index.chat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64a4a1c1412c18_57300657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be4a4a9189cf926604006d532fb70627fa64b7d0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Chat_Project\\lib\\tpl\\index.chat.tpl',
      1 => 1688510907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64a4a1c1412c18_57300657 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="/front/CSS/chat.css">

<?php if ((isset($_smarty_tpl->tpl_vars['session']->value['username']))) {?>
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

    <?php echo '<script'; ?>
>
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
        var message = "<?php echo $_smarty_tpl->tpl_vars['session']->value['username'];?>
" + ": " + document.getElementById('usermsg').value;
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
    <?php echo '</script'; ?>
>
<?php }
}
}
