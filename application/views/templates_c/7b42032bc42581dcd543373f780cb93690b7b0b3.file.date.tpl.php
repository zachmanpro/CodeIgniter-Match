<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-07 22:31:12
         compiled from "application/views\controls\date.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131794f80a410b6a453-02184151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b42032bc42581dcd543373f780cb93690b7b0b3' => 
    array (
      0 => 'application/views\\controls\\date.tpl',
      1 => 1333714475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131794f80a410b6a453-02184151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f80a410bd4cc6_13401963',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f80a410bd4cc6_13401963')) {function content_4f80a410bd4cc6_13401963($_smarty_tpl) {?><?php if (!is_callable('smarty_function_ci_form_validation')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.ci_form_validation.php';
?><div class="control-group<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp1,'error'=>'true'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2!=''){?> error<?php }?>">
    <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['field']->value['display_as'];?>
</label>
    <div class="controls">
        <input type="text" class="date-input input-small" maxlength="19" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['value'])){?>value="<?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>
"<?php }?> id="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" />
        <button class='btn btn-mini date-input-clear'><i class="icon-remove"></i></button>
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp3,'error'=>'true'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4!=''){?>
            <p class="help-inline"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp5,'error'=>'true'),$_smarty_tpl);?>
</p>
        <?php }?>
    </div>
</div>
<?php }} ?>