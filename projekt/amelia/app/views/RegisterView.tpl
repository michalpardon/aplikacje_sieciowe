{extends file="main.tpl"}

{block name=footer}Michał Pardon{/block}
{block name=content}


<section>
        <h3>Podaj dane do rejestracji</h3>
        <form method="post" action="{$conf->action_url}register">
                <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-xsmall">
                            <input id="id_login" type="text" name="login" placeholder="Login" />
                        </div>
						<br>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_pass" type="password" name="pass" placeholder="Hasło" />
                        </div>
						<br>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_confirm" type="password" name="confirm" placeholder="Potwierdź hasło" />
                        </div>
						<br>
                        <div class="col-12">
                                <ul class="actions">
                                        <li><input type="submit" value="Załóż konto" class="primary" /> <a href="{$conf->action_url}login" class="button">Wróć</a></li>
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
