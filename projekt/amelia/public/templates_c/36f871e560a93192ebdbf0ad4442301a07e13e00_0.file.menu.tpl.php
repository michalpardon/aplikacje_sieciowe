<?php
/* Smarty version 4.2.1, created on 2022-12-06 22:33:39
  from 'C:\Users\micha\Documents\xampp\htdocs\amelia\app\views\templates\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_638fb5337b3240_37471467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36f871e560a93192ebdbf0ad4442301a07e13e00' => 
    array (
      0 => 'C:\\Users\\micha\\Documents\\xampp\\htdocs\\amelia\\app\\views\\templates\\menu.tpl',
      1 => 1670362365,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638fb5337b3240_37471467 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('isAdmin', 0);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->role, 'rola');
$_smarty_tpl->tpl_vars['rola']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rola']->value) {
$_smarty_tpl->tpl_vars['rola']->do_else = false;
if ($_smarty_tpl->tpl_vars['rola']->value == "admin") {
$_smarty_tpl->_assignInScope('isAdmin', 1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<header id="header">
        <h1 id="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php">Zarządzanie rachunkami</a></h1>
        <nav id="nav">

                <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showAddBill">Rachunki</a></li>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['isAdmin']->value;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showAll">Zarządzanie użytkownikami</a></li><?php }?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" class="button primary">Wyloguj użytkownika: <strong><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['user']->value->login ?? '', 'UTF-8');?>
</strong> (<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->role, 'rola');
$_smarty_tpl->tpl_vars['rola']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rola']->value) {
$_smarty_tpl->tpl_vars['rola']->do_else = false;
?><i> <?php echo $_smarty_tpl->tpl_vars['rola']->value;?>
</i><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> )</a></li>
                </ul>
        </nav>
</header></><?php }
}
