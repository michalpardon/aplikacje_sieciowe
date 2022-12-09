{extends file="main.tpl"}

{block name=footer}Michał Pardon{/block}

{block name=content}
    
{include file='menu.tpl'}
                                                      
<header class="major">    
    <h2>Moje rachunki</h2>
    
    <form action="{$conf->action_url}mainPage" method="post" class="">
        <ul class="actions">
            <li><button name="billName" type="submit" value="Prąd" class="button icon primary solid a-solid fa-bolt fa-1x">Prąd</button></li>
            <li><button name="billName" type="submit" value="Gaz" class="button icon primary solid a-solid fa-fire-flame-simple fa-1x">Gaz</button></li>
            <li><button name="billName" type="submit" value="Woda" class="button icon primary solid a-solid fa-droplet fa-1x">Woda</button></li>
            <li><button name="billName" type="submit" value="Ścieki" class="button icon primary solid a-solid fa-faucet-drip fa-1x">Ścieki</button></li>
            <li><button name="billName" type="submit" value="Internet" class="button icon primary solid a-solid fa-wifi fa-1x">Internet</button></li>
            <li><button name="billName" type="submit" value="Śmieci" class="button icon primary solid a-solid fa-trash-can fa-1x">Śmieci</button></li>
            <li><a href="{$conf->action_url}MainPage" class="button"><i class="fa-solid fa-reply-all"></i> Wszystkie</a></li>
        </ul>
    </form>
    <form action="{$conf->action_url}mainPage" method="post" class="">
        <ul class="actions">
            <li><input type="text" name="dateA" id="dateA" value="{if $form->dateA == ''}{$form->dateStart}{/if}{if $form->dateA != ''}{$form->dateA}{/if}" /></li>
            <li><input type="text" name="dateB" id="dateB" value="{if $form->dateA == ''}{$smarty.now|date_format:"%Y-%m-%d"}{/if}{if $form->dateA != ''}{$form->dateB}{/if}" /></li>
            <li><select name="billState" id="billState">
                        {if $form->billState == 0 || $form->billState == ''}
                            <option value="0">nieopłacony</option>
                            <option value="1">opłacony</option>
                        {/if}
                        {if $form->billState == 1}
                            <option value="1">opłacony</option>
                            <option value="0">nieopłacony</option>
                        {/if}
                        
                </select></li>
            <li><input type="submit" value="Wyszukaj" class="primary" /></li>
        </ul>
    </form>
<div class="table-wrapper" id="bill">
    <table class="alt">
            <thead>
                    <tr>
                            <th>Rachunek</th>
                            <th>Data wpłynięcia</th>
                            <th>Data zapłaty</th>
                            <th>Status</th>
                            <th>Do zapłaty</th>
                            
                    </tr>
            </thead>
            <tbody> 
                    {foreach $table as $bill}
                    {strip}
                    <tr>
                            <td>{$bill["name"]}</td>
                            <td>{$bill["month"]}</td>
                            <td>{$bill["paymentDay"]}</td>
                            <td>{if $bill["isPaid"] == 0} nieopłacony {/if}{if $bill["isPaid"] == 1} opłacony {/if}</td>
                            <td>{$bill["participation"]|string_format:"%.2f"} zł</td>
                            <td>
                                {if $bill["isPaid"] == 0} 
                                    <a href="{$conf->action_url}payBill/{$bill["bill_idBill"]}/{$bill["user_idUser"]}" class="button primary small">Opłać</a></td>
                                {/if}
                                {if $bill["isPaid"] == 1}
                                    <i class="fa-regular fa-square-check"></i>
                                {/if}
                    </tr>
                    {/strip}
                    {/foreach}
            </tbody>
    </table>
</div>
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

{/block}
