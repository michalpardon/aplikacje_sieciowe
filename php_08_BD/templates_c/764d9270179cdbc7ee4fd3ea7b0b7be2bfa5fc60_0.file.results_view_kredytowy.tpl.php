<?php
/* Smarty version 4.2.1, created on 2022-11-25 16:22:18
  from 'C:\xampp\htdocs\php_08_BD\app\views\results_view_kredytowy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6380ddaac7edd6_35147952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '764d9270179cdbc7ee4fd3ea7b0b7be2bfa5fc60' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_08_BD\\app\\views\\results_view_kredytowy.tpl',
      1 => 1669389734,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6380ddaac7edd6_35147952 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7942205956380ddaac5f498_52884791', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1528940816380ddaac60cc6_97649077', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_7942205956380ddaac5f498_52884791 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_7942205956380ddaac5f498_52884791',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Michał Pardon<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1528940816380ddaac60cc6_97649077 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1528940816380ddaac60cc6_97649077',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<header id="header">
	<h1 id="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php">Kalkulator kredytowy</a></h1>
	<nav id="nav">
							
		<ul>
			<li><a href="#footer">Stopka</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
results">Historia wyników</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" class="button primary">Wyloguj użytkownika: <b><?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</b></a></li>
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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['raty']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["kwota"];?>
 zł</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["lat"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["procent"];?>
 %</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["rata"];?>
 zł</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["total"];?>
 zł</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
</section>


<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php
}
}
/* {/block 'content'} */
}
