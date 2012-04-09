<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 00:10:28
         compiled from "application/views\crud\edit_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:261344f820cd4abf094-35851995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3722e3b78e2275fc247179a0cdf8e089c843bfff' => 
    array (
      0 => 'application/views\\crud\\edit_form.tpl',
      1 => 1333922640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261344f820cd4abf094-35851995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'unique_control_name' => 0,
    'subject' => 0,
    'fields' => 0,
    'field' => 0,
    'row' => 0,
    'list_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f820cd4bb9d20_90388173',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f820cd4bb9d20_90388173')) {function content_4f820cd4bb9d20_90388173($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_crud_edit">
<form class="form-horizontal" method="post" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_edit_form">
  <fieldset>
    <legend>Edit <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</legend>
    <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
        <?php $_smarty_tpl->createLocalArrayVariable('field', null, 0);
$_smarty_tpl->tpl_vars['field']->value["value"] = $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['field']->value['name']];?>
        <?php echo $_smarty_tpl->getSubTemplate ("controls/".((string)$_smarty_tpl->tpl_vars['field']->value['type']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php } ?>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</button>
        <a class="btn" href="<?php echo $_smarty_tpl->tpl_vars['list_url']->value;?>
">Cancel</a>
    </div>
  </fieldset>
</form>
</div><?php }} ?>