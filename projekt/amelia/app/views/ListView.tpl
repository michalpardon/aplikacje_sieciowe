{extends file="main.tpl"}

{block name=footer}Michał Pardon{/block}

{block name=content}

{include file='menu.tpl'}


<form action="{$conf->action_url}showAll" method="post" class="">  
    <ul class="actions">
        <li><input type="text" name="login" id="login" value="{if $filtr->login != ''}{$filtr->login}{/if}" {if $filtr->login == ''}placeholder="Login"{/if} /></li>
        <li><input type="submit" value="Wyszukaj" class="primary" /></li>
        <li><a href="{$conf->action_url}showAll" class="button"><i class="fa-solid fa-reply-all"></i> Reset</a></li>
    </ul>
</form>    
    
<div class="table-wrapper">
    <table class="alt">
            <thead>
                    <tr>
                            <th>Login</th>
                            <th>Data utworzenia</th>
                            <th>Rola</th>
                            <th>Aktywność</th>
                            <th>Data deaktywowania</th>
                            <th></th>
                    </tr>
            </thead>
            <tbody> 
                    {foreach $view as $user}
                    {strip}
                    <tr>
                            <td>{$user["login"]}</td>
                            <td>{$user["creatAt"]}</td>
                            <td>{$user["roleName"]}</td>
                            <td>{if $user["isActive"] == 1} Aktywne {/if}{if $user["isActive"] == 0} Nieaktywne {/if}</td>
                            <td>{$user["deleteAt"]}</td>
                            <td>{if $user["idRoles"] == 2}<a href="{$conf->action_url}addAdmin/{$user["idUser"]}" class="button small">Nadaj admina</a>{/if}
                            {if $user["isActive"] == 1}&nbsp<a href="{$conf->action_url}roleInactive/{$user["idUser_has_role"]}" class="button small">Deaktywuj rolę</a>{/if}
                            &nbsp<a href="{$conf->action_url}userDelete/{$user["idUser"]}" class="button primary small">Usuń użytkownika</a></td>
                    </tr>
                    {/strip}
                    {/foreach}
            </tbody>
    </table>
</div>




{block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg {if $msg->isError()}error bottom-margin{/if} {if $msg->isWarning()}info bottom-margin{/if} {if $msg->isInfo()}info bottom-margin{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{/block}


{/block}
