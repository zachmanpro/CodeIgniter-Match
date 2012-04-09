<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 13:04:11
         compiled from "application/views\crud\add_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196454f82c22be90ee4-46265627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c488a4d9a60c783e96cb2442de1d6458bd56391' => 
    array (
      0 => 'application/views\\crud\\add_form.tpl',
      1 => 1333969252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196454f82c22be90ee4-46265627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'unique_control_name' => 0,
    'subject' => 0,
    'fields' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f82c22bef6144_66695720',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82c22bef6144_66695720')) {function content_4f82c22bef6144_66695720($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_crud_add">
<form class="form-horizontal"  method="post" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_add_form">
  <fieldset>
    <legend>Add <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</legend>
    <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("controls/".((string)$_smarty_tpl->tpl_vars['field']->value['type']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php } ?>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Add <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</button>
        <button class="btn">Cancel</button>
    </div>
  </fieldset>
</form>
</div><?php }} ?>