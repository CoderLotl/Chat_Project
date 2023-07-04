<link rel="stylesheet" href="/front/CSS/loginPanel.css">
{if isset($session.loggedin) && $session.loggedin === true } 
    <form id="panel" action="lib/scripts/managers/mng.login.php" method="POST">
        <label id="lUserName">
            Logged User: 
        </label>
        <label id="lUserNameLogged">
            {$session.username}
        </label><br>
        <button class="loginButton" type="submit" id="btnLogOut">
            Log Out
        </button>
        <input type="hidden" name="type" value="logout">
    </form>
{else}    
    <form id="panel" action="lib/scripts/managers/mng.login.php" method="POST">            
        <label for="lUserName" id="lUserName">
            Username:
        </label>            
        <input type="text" id="userName" name="userName" placeholder="User">            
        <label for="lPassword" id="lPassword">
            Password:
        </label>            
        <input type="password" id="password" name="password" placeholder="Password">
    {if isset($session.wrongLogIn) && $session.wrongLogIn == true }    
        <label id='error'>
            ERROR. Incorrect user and/or password.
        </label>
        {set_session key='wrongLogIn' value=false}        
    {/if}    
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
{/if}