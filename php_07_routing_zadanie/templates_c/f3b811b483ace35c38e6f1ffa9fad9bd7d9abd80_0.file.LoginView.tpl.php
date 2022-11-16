<?php
/* Smarty version 4.2.1, created on 2022-11-16 13:11:23
  from 'C:\xampp\htdocs\php_07_routing_zadanie\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6374d36be44248_54269802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3b811b483ace35c38e6f1ffa9fad9bd7d9abd80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_07_routing_zadanie\\app\\views\\LoginView.tpl',
      1 => 1668358491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6374d36be44248_54269802 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12397142766374d36be39a30_62552965', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_140100666374d36be3b7d3_04515477', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_12397142766374d36be39a30_62552965 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_12397142766374d36be39a30_62552965',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Michał Pardon<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_140100666374d36be3b7d3_04515477 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_140100666374d36be3b7d3_04515477',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="width:90%; margin: 2em auto;">
<section>
        <h3>Podaj dane do logowania</h3>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login">
                <div class="row gtr-uniform gtr-50">
                        <div class="col-6 col-12-xsmall">
                            <input id="id_login" type="text" name="login" placeholder="Login" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                               <input id="id_pass" type="password" name="pass" placeholder="Hasło" />
                        </div>
                        <div class="col-12">
                                <ul class="actions">
                                        <li><input type="submit" value="Zaloguj" class="primary" /></li>
                                </ul>
                        </div>
                </div>
        </form>
</section>


<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php
}
}
/* {/block 'content'} */
}
