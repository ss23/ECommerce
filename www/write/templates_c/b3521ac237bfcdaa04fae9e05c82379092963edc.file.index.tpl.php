<?php /* Smarty version Smarty3-b8, created on 2010-05-02 05:38:50
         compiled from "H:/Apps/wamp/www/htdocs/include/SmartyTemplates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214684bdd0fea819e85-74911362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3521ac237bfcdaa04fae9e05c82379092963edc' => 
    array (
      0 => 'H:/Apps/wamp/www/htdocs/include/SmartyTemplates\\index.tpl',
      1 => 1272719271,
    ),
  ),
  'nocache_hash' => '214684bdd0fea819e85-74911362',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_planslist')) include 'H:/Apps/wamp/www/htdocs/include/SmartyPlugins\function.planslist.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Home"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<?php echo smarty_function_planslist(array(),$_smarty_tpl->smarty,$_smarty_tpl);?>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
