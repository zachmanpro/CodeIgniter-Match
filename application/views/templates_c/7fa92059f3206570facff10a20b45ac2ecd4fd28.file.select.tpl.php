<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 13:43:23
         compiled from "application/views\controls\select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198744f8296a1be26f2-79295179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fa92059f3206570facff10a20b45ac2ecd4fd28' => 
    array (
      0 => 'application/views\\controls\\select.tpl',
      1 => 1333971792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198744f8296a1be26f2-79295179',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f8296a1deeb59_80543838',
  'variables' => 
  array (
    'field' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f8296a1deeb59_80543838')) {function content_4f8296a1deeb59_80543838($_smarty_tpl) {?><?php if (!is_callable('smarty_function_ci_form_validation')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.ci_form_validation.php';
?><div class="control-group<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp1,'error'=>'true'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2!=''){?> error<?php }?>">
    <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['field']->value['display_as'];?>
</label>
    <div class="controls">
        <select data-placeholder="Choose <?php echo $_smarty_tpl->tpl_vars['field']->value['display_as'];?>
..." class="chzn-select" id="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
">
            <option value=""></option>
            <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['value'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['value'])&&$_smarty_tpl->tpl_vars['option']->value['value']==$_smarty_tpl->tpl_vars['field']->value['value']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['option']->value['label'];?>
</option>
            <?php } ?>
        </select>
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp3,'error'=>'true'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4!=''){?>
            <p class="help-inline"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp5,'error'=>'true'),$_smarty_tpl);?>
</p>
        <?php }?>
    </div>
</div><?php }} ?>