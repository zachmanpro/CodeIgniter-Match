<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-08 17:53:48
         compiled from "application/views\controls\texteditor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243304f80a410a94f35-38299500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c94947279ed09763b858c321cdbc6796684f6b3a' => 
    array (
      0 => 'application/views\\controls\\texteditor.tpl',
      1 => 1333900416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243304f80a410a94f35-38299500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f80a410b2ddc3_87261721',
  'variables' => 
  array (
    'field' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f80a410b2ddc3_87261721')) {function content_4f80a410b2ddc3_87261721($_smarty_tpl) {?><?php if (!is_callable('smarty_function_ci_form_validation')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.ci_form_validation.php';
?><div class="control-group<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp1,'error'=>'true'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2!=''){?> error<?php }?>">
    <label class="control-label" for="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['field']->value['display_as'];?>
</label>
    <div class="controls">
        <textarea class="texteditor_adv" id="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
"><?php if (isset($_smarty_tpl->tpl_vars['field']->value['value'])){?><?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>
<?php }?></textarea>
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp3,'error'=>'true'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4!=''){?>
            <p class="help-inline"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_ci_form_validation(array('field'=>$_tmp5,'error'=>'true'),$_smarty_tpl);?>
</p>
        <?php }?>
    </div>
</div><?php }} ?>