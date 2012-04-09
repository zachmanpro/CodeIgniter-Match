<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 12:18:50
         compiled from "application/views\crud\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29754f81a702df16c7-33782792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd166f376443b61a4f68b6be8153f1696b1005c20' => 
    array (
      0 => 'application/views\\crud\\edit.tpl',
      1 => 1333966693,
      2 => 'file',
    ),
    '33638f2dc34c7caf0441821a70a390df6c4ea9e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\wu_crud_test\\application\\views\\layout.tpl',
      1 => 1333716800,
      2 => 'file',
    ),
    '3722e3b78e2275fc247179a0cdf8e089c843bfff' => 
    array (
      0 => 'application/views\\crud\\edit_form.tpl',
      1 => 1333922640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29754f81a702df16c7-33782792',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f81a703064291_93775345',
  'variables' => 
  array (
    'base_url' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f81a703064291_93775345')) {function content_4f81a703064291_93775345($_smarty_tpl) {?><?php if (!is_callable('smarty_function_include_js_once')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.include_js_once.php';
if (!is_callable('smarty_function_include_css_once')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.include_css_once.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='UTF-8' />
	<title>My Page</title>
	<!--[if IE]>
		<?php echo smarty_function_include_js_once(array('file'=>"http://html5shiv.googlecode.com/svn/trunk/html5.js"),$_smarty_tpl);?>

	<![endif]-->
	<?php echo smarty_function_include_css_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/bootstrap/css/bootstrap.css"),$_smarty_tpl);?>

	<?php echo smarty_function_include_css_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/bootstrap/css/bootstrap-responsive.css"),$_smarty_tpl);?>

	<?php echo smarty_function_include_css_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/css/uistyle.css"),$_smarty_tpl);?>


	<?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/jquery.js"),$_smarty_tpl);?>

	<?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/jqueryui.js"),$_smarty_tpl);?>

	<?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/bootstrap/js/bootstrap.js"),$_smarty_tpl);?>


    

	<script type="text/javascript">
		var base_url = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";
	</script>
	
        <?php echo smarty_function_include_css_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/css/chosen.css"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/jquery.js"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/jqueryui.js"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/js/jqueryui_config.js"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/tinymce/jquery.tinymce.js"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/js/tinymce_config.js"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/plugins/jquery.chosen.min.js"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/plugins/jquery.form.js"),$_smarty_tpl);?>

        <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/plugins/jquery-ui-timepicker-addon.js"),$_smarty_tpl);?>


        <script type="text/javascript">
            $(function(){
                <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_edit_events();
            });

            function <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_edit_events() {

                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_edit_form").submit(function(){
                    var this_form = $(this);

                    //$('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_refresh').html('loading...');

                    this_form.ajaxSubmit({
                        url: "<?php echo $_smarty_tpl->tpl_vars['ajax_update_uri']->value;?>
",
                        success: function($data) {
                            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_crud_edit").html($data);
                            <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_edit_events();
                            load_tinymce_adv();
                            load_tinymce_simple();
                        }
                    })
                    return false;
                });
            }
        </script>

</head>

<body>
    <div class="container">
		<header>
			My Header
		</header>
		<hr />
		
		<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)){?>
			<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

		<?php }?>
		
		
		
        
    <?php /*  Call merged included template "crud/edit_form.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("crud/edit_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '29754f81a702df16c7-33782792');
content_4f82b78a872a62_23882733($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "crud/edit_form.tpl" */?>

        <hr />
        <footer>
			My Footer
        </footer>
    </div>
</body>

</html>
<?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 12:18:50
         compiled from "application/views\crud\edit_form.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f82b78a872a62_23882733')) {function content_4f82b78a872a62_23882733($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
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