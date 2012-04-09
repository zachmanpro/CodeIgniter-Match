<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 09:35:40
         compiled from "application/views\controls\hidden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276574f82914ca07e37-43260945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ffa8b9b85148171a590f0227bb71f1343df87db' => 
    array (
      0 => 'application/views\\controls\\hidden.tpl',
      1 => 1333714500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276574f82914ca07e37-43260945',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f82914ca7b2f0_95122286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82914ca7b2f0_95122286')) {function content_4f82914ca7b2f0_95122286($_smarty_tpl) {?><input type="hidden" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['value'])){?>value="<?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>
"<?php }?> id="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" /><?php }} ?>