<?php /* Smarty version Smarty3-b8, created on 2010-05-09 07:55:42
         compiled from "H:/Apps/wamp/www/htdocs/include/SmartyTemplates\function.planslist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171774be66a7e740db0-38519145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cdc5bc4ccb5029f8a06b46bdf4f09f3978af5f2' => 
    array (
      0 => 'H:/Apps/wamp/www/htdocs/include/SmartyTemplates\\function.planslist.tpl',
      1 => 1273391740,
    ),
  ),
  'nocache_hash' => '171774be66a7e740db0-38519145',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_image')) include 'H:/Apps/wamp/www/htdocs/include/SmartyPlugins\function.image.php';
?><ul id="plans">
Here's an awesome list of plans we offer!
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['plan']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['name'] = 'plan';
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('plans')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['plan']['total']);
?>
	<li><a href="index.php?p=Plan&plan=<?php echo $_smarty_tpl->getVariable('plans')->value[$_smarty_tpl->getVariable('smarty')->value['section']['plan']['index']]['uuid'];?>
"><?php echo smarty_function_image(array('name'=>($_smarty_tpl->getVariable('plans')->value[$_smarty_tpl->getVariable('smarty')->value['section']['plan']['index']]['image']),'alt'=>($_smarty_tpl->getVariable('plans')->value[$_smarty_tpl->getVariable('smarty')->value['section']['plan']['index']]['name']),'width'=>300,'height'=>200),$_smarty_tpl->smarty,$_smarty_tpl);?>
</a></li>
<?php endfor; else: ?>
	<li class="none">No Plans Avaliable</li>
<?php endif; ?>
</ul>