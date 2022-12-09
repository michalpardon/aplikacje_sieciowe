<?php
/* Smarty version 4.2.1, created on 2022-12-06 23:57:10
  from 'C:\Users\micha\Documents\xampp\htdocs\amelia\app\views\AddBillView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_638fc8c6397778_92901365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6ad4294302b66cad194e950591e79ac89a4b036' => 
    array (
      0 => 'C:\\Users\\micha\\Documents\\xampp\\htdocs\\amelia\\app\\views\\AddBillView.tpl',
      1 => 1670367428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_638fc8c6397778_92901365 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_399894990638fc8c6335609_29789829', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_490733271638fc8c6337a82_70537341', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_399894990638fc8c6335609_29789829 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_399894990638fc8c6335609_29789829',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Michał Pardon<?php
}
}
/* {/block 'footer'} */
/* {block 'messages'} */
class Block_509334782638fc8c6368ec1_33909396 extends Smarty_Internal_Block
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
class Block_490733271638fc8c6337a82_70537341 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_490733271638fc8c6337a82_70537341',
  ),
  'messages' => 
  array (
    0 => 'Block_509334782638fc8c6368ec1_33909396',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\micha\\Documents\\xampp\\htdocs\\amelia\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>


<?php $_smarty_tpl->_subTemplateRender('file:menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
<header class="major">
    <section id="addBill">
        <h2>Dodaj nowy rachunek</h2>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addBill">
                    <div class="row gtr-uniform gtr-50">
                            <div class="col-6 col-12-xsmall">
                                    <select name="bill_name_idName" id="bill_name_idName">
                                            <option value="">- Nazwa rachunku -</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['billNames']->value, 'name');
$_smarty_tpl->tpl_vars['name']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['name']->value["idName"];?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value["name"];?>
</option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                            </div>
                            <div class="col-6 col-12-xsmall">
                                    <input type="text" name="amount" id="amount" value="" placeholder="Kwota" />
                            </div>
                            <div class="col-6 col-12-xsmall">
                                    <input type="text" name="month" id="month" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" placeholder="" />
                            </div>
                            <div class="col-12">
                                    <ul class="actions">
                                            <li><input type="submit" value="Dodaj rachunek" class="primary" /></li>
                                            <li><input type="reset" value="Wyczyść" /></li>
                                    </ul>
                            </div>
                    </div>
                    <input type="hidden" name="login" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
">
            </form>
    </section>
</header>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_509334782638fc8c6368ec1_33909396', 'messages', $this->tplIndex);
?>

            
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
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['billsList']->value, 'bill');
$_smarty_tpl->tpl_vars['bill']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
$_smarty_tpl->tpl_vars['bill']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["month"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["amount"];?>
 zł</td><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["type"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["state"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["who"];?>
</td></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
    </table>
</div>
</header>                    

<?php
}
}
/* {/block 'content'} */
}
