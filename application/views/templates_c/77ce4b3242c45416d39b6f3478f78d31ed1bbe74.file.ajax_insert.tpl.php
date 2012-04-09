<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 13:03:51
         compiled from "application/views\crud\ajax_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116024f82c217b98515-24305261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77ce4b3242c45416d39b6f3478f78d31ed1bbe74' => 
    array (
      0 => 'application/views\\crud\\ajax_insert.tpl',
      1 => 1333968941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116024f82c217b98515-24305261',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'success' => 0,
    'subject' => 0,
    'list_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f82c217bfebf6_75403127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82c217bfebf6_75403127')) {function content_4f82c217bfebf6_75403127($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['success']->value){?>
<div class="alert alert-success">
    <strong>Success</strong> <br />
    <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
 successfully added. <br />
    <br />
    <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['list_url']->value;?>
">Back to <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
 list.</a>
</div>
<?php }else{ ?>
<div class="alert alert-error">
    <strong>Error</strong> <br />
    Something went wrong while adding <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
, please try again or contact support. <br />
    <br />
    <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['list_url']->value;?>
">Back to <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
 list.</a>
</div>
<?php }?><?php }} ?>