<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 13:46:02
         compiled from "application/views\crud\ajax_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205774f81bb3b52b206-33811650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '593e4d58e21a3bc1b70ba9e7ccfa1b87815719d3' => 
    array (
      0 => 'application/views\\crud\\ajax_update.tpl',
      1 => 1333968952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205774f81bb3b52b206-33811650',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f81bb3b546496_00067879',
  'variables' => 
  array (
    'success' => 0,
    'subject' => 0,
    'list_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f81bb3b546496_00067879')) {function content_4f81bb3b546496_00067879($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['success']->value){?>
<div class="alert alert-success">
    <strong>Success</strong> <br />
    <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
 successfully updated. <br />
    <br />
    <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['list_url']->value;?>
">Back to <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
 list.</a>
</div>
<?php }else{ ?>
<div class="alert alert-error">
    <strong>Error</strong> <br />
    Something went wrong while updateing <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
, please try again or contact support. <br />
    <br />
    <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['list_url']->value;?>
">Back to <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
 list.</a>
</div>

<?php }?><?php }} ?>