<div class="wrapper">
    <div id="formContent">
        {if isset($errorMessage)}
            {foreach $errorMessage as $mes}
                <p class="erMessage">{$mes}!</p>
            {/foreach}
        {/if}
        <!-- Login Form -->
        <form method="post" action="" class="login">
            <input type="text" id="login" class="second" name="login" placeholder="login" value="{$post['login']|default:''}">
            <input type="text" id="password" class="third" name="password" placeholder="password">
            <input type="submit" class="fourth" value="Log In" name="loginBtn">
        </form>
    </div>
</div>