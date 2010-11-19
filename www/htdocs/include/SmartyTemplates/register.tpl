{include file="header.tpl" title="Home"}

Please register an account, because it's awesome and stuff.
{if $user}
	You're already registered silly!
{/if}

{foreach from=$errors item=error}
{$error}<br />
{foreachelse}{/foreach}
<form action="/register.php" method="post">
	Username:* <input type="text" name="username" required /><br />
	Password:* <input type="password" name="password" required /><br />
	Email:*    <input type="email" name="email" required /><br /><br />
	
	First Name: <input type="text" name="first_name" /><br />
	Last Name:  <input type="text" name="last_name" /><br />
	
	Country: 
		<select name="country">
			{foreach from=$countries item=country}
			<option value="{$country.code}">{$country.name}</option>
			{/foreach}
		</select>
	<br /><br />
	<input type="submit" name="submit" value="submit" />
</form>
