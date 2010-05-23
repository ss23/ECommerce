<?php /* Smarty version Smarty3-b8, created on 2010-05-23 10:46:36
         compiled from "C:\Documents and Settings\Nick Jenkin\My Documents\Dec\wamp\www\htdocs/include/SmartyTemplates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30794bf9078c314076-34709564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca2dce8b3896f707b5ee53b6c7ab002c97b6cb84' => 
    array (
      0 => 'C:\\Documents and Settings\\Nick Jenkin\\My Documents\\Dec\\wamp\\www\\htdocs/include/SmartyTemplates\\index.tpl',
      1 => 1272719271,
    ),
  ),
  'nocache_hash' => '30794bf9078c314076-34709564',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_planslist')) include 'C:\Documents and Settings\Nick Jenkin\My Documents\Dec\wamp\www\htdocs/include/SmartyPlugins\function.planslist.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Home"); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<?php echo smarty_function_planslist(array(),$_smarty_tpl->smarty,$_smarty_tpl);?>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
