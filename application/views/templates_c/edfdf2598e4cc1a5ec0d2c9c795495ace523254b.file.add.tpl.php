<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 13:02:24
         compiled from "application/views\crud\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68804f809e82c6bc73-63862856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edfdf2598e4cc1a5ec0d2c9c795495ace523254b' => 
    array (
      0 => 'application/views\\crud\\add.tpl',
      1 => 1333969333,
      2 => 'file',
    ),
    '33638f2dc34c7caf0441821a70a390df6c4ea9e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\wu_crud_test\\application\\views\\layout.tpl',
      1 => 1333716800,
      2 => 'file',
    ),
    '5c488a4d9a60c783e96cb2442de1d6458bd56391' => 
    array (
      0 => 'application/views\\crud\\add_form.tpl',
      1 => 1333969252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68804f809e82c6bc73-63862856',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f809e82dde7c5_06348678',
  'variables' => 
  array (
    'base_url' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f809e82dde7c5_06348678')) {function content_4f809e82dde7c5_06348678($_smarty_tpl) {?><?php if (!is_callable('smarty_function_include_js_once')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.include_js_once.php';
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
_link_crud_add_events();
        });

        function <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_add_events() {

            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_add_form").submit(function(){
                var this_form = $(this);

                //$('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_refresh').html('loading...');

                this_form.ajaxSubmit({
                    url: "<?php echo $_smarty_tpl->tpl_vars['ajax_insert_uri']->value;?>
",
                    success: function($data) {
                        $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_crud_add").html($data);
                        <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_add_events();
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
		
		
		
        
  <?php /*  Call merged included template "crud/add_form.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("crud/add_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '68804f809e82c6bc73-63862856');
content_4f82c1c07ebbf1_64818682($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "crud/add_form.tpl" */?>

        <hr />
        <footer>
			My Footer
        </footer>
    </div>
</body>

</html>
<?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-09 13:02:24
         compiled from "application/views\crud\add_form.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f82c1c07ebbf1_64818682')) {function content_4f82c1c07ebbf1_64818682($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
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