<?php
/* Smarty version 4.2.1, created on 2022-12-09 11:58:16
  from 'C:\Users\micha\Documents\xampp\htdocs\amelia\app\views\ListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_639314c8569f41_68256980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2a693394d43c36e6b74b2458fa9b18755e18267' => 
    array (
      0 => 'C:\\Users\\micha\\Documents\\xampp\\htdocs\\amelia\\app\\views\\ListView.tpl',
      1 => 1670583494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_639314c8569f41_68256980 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_109645347639314c852f068_50984137', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1580621936639314c85307f0_59677529', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_109645347639314c852f068_50984137 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_109645347639314c852f068_50984137',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Michał Pardon<?php
}
}
/* {/block 'footer'} */
/* {block 'messages'} */
class Block_69124490639314c85581a8_61623212 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
<div class="messages bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
	<li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error bottom-margin<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>info bottom-margin<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info bottom-margin<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }?>

<?php
}
}
/* {/block 'messages'} */
/* {block 'content'} */
class Block_1580621936639314c85307f0_59677529 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1580621936639314c85307f0_59677529',
  ),
  'messages' => 
  array (
    0 => 'Block_69124490639314c85581a8_61623212',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php $_smarty_tpl->_subTemplateRender('file:menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showAll" method="post" class="">  
    <ul class="actions">
        <li><input type="text" name="login" id="login" value="<?php if ($_smarty_tpl->tpl_vars['filtr']->value->login != '') {
echo $_smarty_tpl->tpl_vars['filtr']->value->login;
}?>" <?php if ($_smarty_tpl->tpl_vars['filtr']->value->login == '') {?>placeholder="Login"<?php }?> /></li>
        <li><input type="submit" value="Wyszukaj" class="primary" /></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showAll" class="button"><i class="fa-solid fa-reply-all"></i> Reset</a></li>
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
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['user']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value["creatAt"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['user']->value["roleName"];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['user']->value["isActive"] == 1) {?> Aktywne <?php }
if ($_smarty_tpl->tpl_vars['user']->value["isActive"] == 0) {?> Nieaktywne <?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['user']->value["deleteAt"];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['user']->value["idRoles"] == 2) {?><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addAdmin/<?php echo $_smarty_tpl->tpl_vars['user']->value["idUser"];?>
" class="button small">Nadaj admina</a><?php }
if ($_smarty_tpl->tpl_vars['user']->value["isActive"] == 1) {?>&nbsp<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
roleInactive/<?php echo $_smarty_tpl->tpl_vars['user']->value["idUser_has_role"];?>
" class="button small">Deaktywuj rolę</a><?php }?>&nbsp<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete/<?php echo $_smarty_tpl->tpl_vars['user']->value["idUser"];?>
" class="button primary small">Usuń użytkownika</a></td></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
    </table>
</div>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_69124490639314c85581a8_61623212', 'messages', $this->tplIndex);
?>



<?php
}
}
/* {/block 'content'} */
}
