{include file="header.tpl" title="Log in"}

Please register an account, because it's awesome and stuff.
{if $user}
	You're already logged in silly!
{/if}

{foreach from=$errors item=error}
{$error}<br />
{foreachelse}{/foreach}
<form action="/login.php" method="post">
	Username:* <input type="text" name="username" required /><br />
	Password:* <input type="password" name="password" required /><br />

	<input type="submit" name="submit" value="submit" />
</form>
