{extends file="main.tpl"}

{block name=footer}Michał Pardon{/block}

{block name=content}

<div style="width:90%; margin: 2em auto;">

<section>
        <h3>Podaj dane do logowania</h3>
        <form method="post" action="{$conf->action_url}login">
                <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-xsmall">
                            <input id="id_login" type="text" name="login" placeholder="Login" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_pass" type="password" name="pass" placeholder="Hasło" />
                        </div>
                        <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Zaloguj" class="primary" /></li></form>
                                    <li><form action="{$conf->action_url}register" method="post"><input type="submit" value="Załóż konto" class="button" /></form></li>      
                                </ul>
                        </div>
                </div>
        </form>

</section>


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

</div>
{/block}
