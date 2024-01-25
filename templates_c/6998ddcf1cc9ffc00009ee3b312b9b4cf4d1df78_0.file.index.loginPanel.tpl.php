<?php
/* Smarty version 4.3.1, created on 2023-07-11 18:55:52
  from 'C:\xampp\htdocs\Chat_Project2\lib\tpl\index.loginPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64ad89989af055_17498468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6998ddcf1cc9ffc00009ee3b312b9b4cf4d1df78' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Chat_Project2\\lib\\tpl\\index.loginPanel.tpl',
      1 => 1689044736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ad89989af055_17498468 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="/front/CSS/loginPanel.css">
<?php if ((isset($_smarty_tpl->tpl_vars['session']->value['loggedin'])) && $_smarty_tpl->tpl_vars['session']->value['loggedin'] === true) {?> 
    <form id="panel" action="lib/scripts/managers/mng.login.php" method="POST">
        <label id="lUserName">
            Logged User: 
        </label>
        <label id="lUserNameLogged">
            <?php echo $_smarty_tpl->tpl_vars['session']->value['username'];?>

        </label><br>
        <button class="loginButton" type="submit" id="btnLogOut">
            Log Out
        </button>
        <input type="hidden" name="type" value="logout">
    </form>
<?php } else { ?>    
    <form id="panel" action="lib/scripts/managers/mng.login.php" method="POST">            
        <label for="lUserName" id="lUserName">
            Username:
        </label>            
        <input type="text" id="userName" name="userName" placeholder="User">            
        <label for="lPassword" id="lPassword">
            Password:
        </label>            
        <input type="password" id="password" name="password" placeholder="Password">
    <?php if ((isset($_smarty_tpl->tpl_vars['session']->value['wrongLogIn'])) && $_smarty_tpl->tpl_vars['session']->value['wrongLogIn'] == true) {?>    
        <label id='error'>
            ERROR. Incorrect user and/or password.
        </label>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['set_session'][0], array( array('key'=>'wrongLogIn','value'=>false),$_smarty_tpl ) );?>
        
    <?php }?>    
    <input type="hidden" name="type" value="login">            
    <br>
    <div id="panelButtons">
        <button class="loginButton" type="submit" id="btnLogin">
            Log In
        </button>
        <button class="loginButton" href="#" name="signIn">
            Sign In
        </button>
    </div>
    </form>
<?php }
}
}
