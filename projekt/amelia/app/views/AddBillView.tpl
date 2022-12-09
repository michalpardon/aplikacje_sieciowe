{extends file="main.tpl"}

{block name=footer}Michał Pardon{/block}

{block name=content}

{include file='menu.tpl'}

    
<header class="major">
    <section id="addBill">
        <h2>Dodaj nowy rachunek</h2>
            <form method="post" action="{$conf->action_url}addBill">
                    <div class="row gtr-uniform gtr-50">
                            <div class="col-6 col-12-xsmall">
                                    <select name="bill_name_idName" id="bill_name_idName">
                                            <option value="">- Nazwa rachunku -</option>
                                            {foreach $billNames as $name}
                                            <option value="{$name["idName"]}">{$name["name"]}</option>
                                            {/foreach}
                                    </select>
                            </div>
                            <div class="col-6 col-12-xsmall">
                                    <input type="text" name="amount" id="amount" value="" placeholder="Kwota" />
                            </div>
                            <div class="col-6 col-12-xsmall">
                                    <input type="text" name="month" id="month" value="{$smarty.now|date_format:"%Y-%m-%d"}" placeholder="" />
                            </div>
                            <div class="col-12">
                                    <ul class="actions">
                                            <li><input type="submit" value="Dodaj rachunek" class="primary" /></li>
                                            <li><input type="reset" value="Wyczyść" /></li>
                                    </ul>
                            </div>
                    </div>
                    <input type="hidden" name="login" value="{$user->login}">
            </form>
    </section>
</header>

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
            
<header class="major">
    <h2>Lista dodanych rachunków</h2>

    
<div class="table-wrapper" id="bill">
    <table class="alt">
            <thead>
                    <tr>
                            <th>Rachunek</th>
                            <th>Data wpłynięcia</th>
                            <th>Kwota</th>
                            <th>Typ</th>
                            <th>Status</th>
                            <th>Dodał</th>
                    </tr>
            </thead>
            <tbody> 
                    {foreach $billsList as $bill}
                    {strip}
                    <tr>
                            <td>{$bill["name"]}</td>
                            <td>{$bill["month"]}</td>
                            <td>{$bill["amount"]} zł</td>
                            <td>{$bill["type"]}</td>
                            <td>{$bill["state"]}</td>
                            <td>{$bill["who"]}</td>
                    </tr>
                    {/strip}
                    {/foreach}
            </tbody>
    </table>
</div>
</header>                    

{/block}
