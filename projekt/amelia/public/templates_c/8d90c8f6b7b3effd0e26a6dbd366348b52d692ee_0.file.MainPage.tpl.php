<?php
/* Smarty version 4.2.1, created on 2022-12-09 09:23:26
  from 'C:\Users\micha\Documents\xampp\htdocs\amelia\app\views\MainPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6392f07ecd9c39_30183463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d90c8f6b7b3effd0e26a6dbd366348b52d692ee' => 
    array (
      0 => 'C:\\Users\\micha\\Documents\\xampp\\htdocs\\amelia\\app\\views\\MainPage.tpl',
      1 => 1670574203,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_6392f07ecd9c39_30183463 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12439179186392f07ec440c1_86945605', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6522293136392f07ec456c4_30892985', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_12439179186392f07ec440c1_86945605 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_12439179186392f07ec440c1_86945605',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Michał Pardon<?php
}
}
/* {/block 'footer'} */
/* {block 'messages'} */
class Block_18328091576392f07eccc3a8_93795902 extends Smarty_Internal_Block
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
class Block_6522293136392f07ec456c4_30892985 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6522293136392f07ec456c4_30892985',
  ),
  'messages' => 
  array (
    0 => 'Block_18328091576392f07eccc3a8_93795902',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\micha\\Documents\\xampp\\htdocs\\amelia\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    
<?php $_smarty_tpl->_subTemplateRender('file:menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                                                      
<header class="major">    
    <h2>Moje rachunki</h2>
    
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
mainPage" method="post" class="">
        <ul class="actions">
            <li><button name="billName" type="submit" value="Prąd" class="button icon primary solid a-solid fa-bolt fa-1x">Prąd</button></li>
            <li><button name="billName" type="submit" value="Gaz" class="button icon primary solid a-solid fa-fire-flame-simple fa-1x">Gaz</button></li>
            <li><button name="billName" type="submit" value="Woda" class="button icon primary solid a-solid fa-droplet fa-1x">Woda</button></li>
            <li><button name="billName" type="submit" value="Ścieki" class="button icon primary solid a-solid fa-faucet-drip fa-1x">Ścieki</button></li>
            <li><button name="billName" type="submit" value="Internet" class="button icon primary solid a-solid fa-wifi fa-1x">Internet</button></li>
            <li><button name="billName" type="submit" value="Śmieci" class="button icon primary solid a-solid fa-trash-can fa-1x">Śmieci</button></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
MainPage" class="button"><i class="fa-solid fa-reply-all"></i> Wszystkie</a></li>
        </ul>
    </form>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
mainPage" method="post" class="">
        <ul class="actions">
            <li><input type="text" name="dateA" id="dateA" value="<?php if ($_smarty_tpl->tpl_vars['form']->value->dateA == '') {
echo $_smarty_tpl->tpl_vars['form']->value->dateStart;
}
if ($_smarty_tpl->tpl_vars['form']->value->dateA != '') {
echo $_smarty_tpl->tpl_vars['form']->value->dateA;
}?>" /></li>
            <li><input type="text" name="dateB" id="dateB" value="<?php if ($_smarty_tpl->tpl_vars['form']->value->dateA == '') {
echo smarty_modifier_date_format(time(),"%Y-%m-%d");
}
if ($_smarty_tpl->tpl_vars['form']->value->dateA != '') {
echo $_smarty_tpl->tpl_vars['form']->value->dateB;
}?>" /></li>
            <li><select name="billState" id="billState">
                        <?php if ($_smarty_tpl->tpl_vars['form']->value->billState == 0 || $_smarty_tpl->tpl_vars['form']->value->billState == '') {?>
                            <option value="0">nieopłacony</option>
                            <option value="1">opłacony</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['form']->value->billState == 1) {?>
                            <option value="1">opłacony</option>
                            <option value="0">nieopłacony</option>
                        <?php }?>
                        
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
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['table']->value, 'bill');
$_smarty_tpl->tpl_vars['bill']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
$_smarty_tpl->tpl_vars['bill']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["month"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['bill']->value["paymentDay"];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['bill']->value["isPaid"] == 0) {?> nieopłacony <?php }
if ($_smarty_tpl->tpl_vars['bill']->value["isPaid"] == 1) {?> opłacony <?php }?></td><td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['bill']->value["participation"]);?>
 zł</td><td><?php if ($_smarty_tpl->tpl_vars['bill']->value["isPaid"] == 0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
payBill/<?php echo $_smarty_tpl->tpl_vars['bill']->value["bill_idBill"];?>
/<?php echo $_smarty_tpl->tpl_vars['bill']->value["user_idUser"];?>
" class="button primary small">Opłać</a></td><?php }
if ($_smarty_tpl->tpl_vars['bill']->value["isPaid"] == 1) {?><i class="fa-regular fa-square-check"></i><?php }?></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
    </table>
</div>
</header>                    


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18328091576392f07eccc3a8_93795902', 'messages', $this->tplIndex);
?>


<?php
}
}
/* {/block 'content'} */
}
