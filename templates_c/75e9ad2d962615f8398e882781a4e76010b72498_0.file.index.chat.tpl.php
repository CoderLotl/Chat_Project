<?php
/* Smarty version 4.3.1, created on 2023-07-11 18:55:52
  from 'C:\xampp\htdocs\Chat_Project2\lib\tpl\index.chat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64ad8998b67ea0_96759263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75e9ad2d962615f8398e882781a4e76010b72498' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Chat_Project2\\lib\\tpl\\index.chat.tpl',
      1 => 1689044736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ad8998b67ea0_96759263 (Smarty_Internal_Template $_smarty_tpl) {
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
