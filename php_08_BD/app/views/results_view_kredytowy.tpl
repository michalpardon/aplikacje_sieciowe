{extends file="main.tpl"}

{block name=footer}Michał Pardon{/block}

{block name=content}

<header id="header">
	<h1 id="logo"><a href="{$conf->app_url}/index.php">Kalkulator kredytowy</a></h1>
	<nav id="nav">
							
		<ul>
			<li><a href="#footer">Stopka</a></li>
			<li><a href="{$conf->action_url}results">Historia wyników</a></li>
			<li><a href="{$conf->action_url}logout" class="button primary">Wyloguj użytkownika: <b>{$user->login}</b></a></li>
		</ul>
	</nav>
</header>


<div style="width:90%; margin: 2em auto;">
<section>
	<table>
<thead>
	<tr>
		<th>Kwota</th>
		<th>Ile lat</th>
		<th>Oprocentowanie</th>
		<th>Wysokość miesięcznej raty</th>
                <th>Całkowita kwota do spłaty</th>
	</tr>
</thead>
<tbody>
{foreach $raty as $p}
{strip}
	<tr>
		<td>{$p["kwota"]} zł</td>
		<td>{$p["lat"]}</td>
		<td>{$p["procent"]} %</td>
                <td>{$p["rata"]} zł</td>
                <td>{$p["total"]} zł</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
</section>


{include file='messages.tpl'}
</div>
{/block}
