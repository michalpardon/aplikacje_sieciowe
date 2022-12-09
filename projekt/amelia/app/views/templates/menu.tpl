
{assign var="isAdmin" value=0}

{foreach $user->role as $rola}
{if $rola == "admin"}{$isAdmin = 1}{/if}
{/foreach}
<header id="header">
        <h1 id="logo"><a href="{$conf->app_url}/index.php">Zarządzanie rachunkami</a></h1>
        <nav id="nav">

                <ul>
                        <li><a href="{$conf->action_url}showAddBill">Rachunki</a></li>
                        {if {$isAdmin} == 1}<li><a href="{$conf->action_url}showAll">Zarządzanie użytkownikami</a></li>{/if}
                        <li><a href="{$conf->action_url}logout" class="button primary">Wyloguj użytkownika: <strong>{$user->login|upper}</strong> ({foreach $user->role as $rola}<i> {$rola}</i>{/foreach} )</a></li>
                </ul>
        </nav>
</header></>