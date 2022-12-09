<?php
/* Smarty version 4.2.1, created on 2022-12-08 21:31:17
  from 'C:\Users\micha\Documents\xampp\htdocs\amelia\app\views\RegisterView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63924995605d85_20169160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1a61446015f87708b1a55fe8e7bbe1ade584ec7' => 
    array (
      0 => 'C:\\Users\\micha\\Documents\\xampp\\htdocs\\amelia\\app\\views\\RegisterView.tpl',
      1 => 1670513452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63924995605d85_20169160 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1821306233639249955d4f05_07299721', 'footer');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155624176639249955d7e08_66612591', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_1821306233639249955d4f05_07299721 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1821306233639249955d4f05_07299721',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Michał Pardon<?php
}
}
/* {/block 'footer'} */
/* {block 'messages'} */
class Block_1344732022639249955e0c41_97399137 extends Smarty_Internal_Block
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
class Block_155624176639249955d7e08_66612591 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_155624176639249955d7e08_66612591',
  ),
  'messages' => 
  array (
    0 => 'Block_1344732022639249955e0c41_97399137',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



<section>
        <h3>Podaj dane do rejestracji</h3>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register">
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
                                        <li><input type="submit" value="Załóż konto" class="primary" /> <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" class="button">Wróć</a></li>
                                </ul>
                        </div>
                </div>
        </form>
</section>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1344732022639249955e0c41_97399137', 'messages', $this->tplIndex);
?>


</div>
<?php
}
}
/* {/block 'content'} */
}
