<ul id="plans">
Here's an awesome list of plans we offer!
{section name=plan loop=$plans}
	<li><a href="index.php?p=Plan&plan={$plans[plan].uuid}"><img scr="images/{$plans[plan].image}" alt="{$plans[plan].name}" /></a></li>
{sectionelse}
	<li class="none">No Plans Avaliable</li>
{/section}
</ul>
