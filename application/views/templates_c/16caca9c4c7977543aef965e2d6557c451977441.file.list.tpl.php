<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-08 15:54:21
         compiled from "application/views\crud\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181324f8081e16f6544-96380549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16caca9c4c7977543aef965e2d6557c451977441' => 
    array (
      0 => 'application/views\\crud\\list.tpl',
      1 => 1333885273,
      2 => 'file',
    ),
    '33638f2dc34c7caf0441821a70a390df6c4ea9e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\wu_crud_test\\application\\views\\layout.tpl',
      1 => 1333716800,
      2 => 'file',
    ),
    '34cd2398ea3b7f7ac0c726d3e9e4a1cd5cd6ccbf' => 
    array (
      0 => 'application/views\\crud\\list_table.tpl',
      1 => 1333893250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181324f8081e16f6544-96380549',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f8081e19ad912_80497133',
  'variables' => 
  array (
    'base_url' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f8081e19ad912_80497133')) {function content_4f8081e19ad912_80497133($_smarty_tpl) {?><?php if (!is_callable('smarty_function_include_js_once')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.include_js_once.php';
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
	
    <?php echo smarty_function_include_js_once(array('file'=>((string)$_smarty_tpl->tpl_vars['base_url']->value)."assets/jquery/plugins/jquery.form.js"),$_smarty_tpl);?>

    <script type="text/javascript">
        $(function(){
            <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_list_events();
        });

        function <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_list_events()
        {
            $('a#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_searchbtn').click(function(){
                $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_searchbox').toggle();
                return false;
            });

            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").submit(function(){
                //alert('Here');
                var this_form = $(this);

                $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_refresh').html('loading...');

                this_form.ajaxSubmit({
                    url: "<?php echo $_smarty_tpl->tpl_vars['ajax_list_uri']->value;?>
",
                    success: function($data) {
                        //alert($data);
                        $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_crud_list').html($data);
                        <?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_link_crud_list_events();
                    }
                })
                return false;
            });

            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_first").click(function(){
                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page").val(1);
                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
            });

            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_prev").click(function(){
                if( $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page').val() != "1")
                {
                    $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page").val(parseInt($('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page').val()) - 1);
                    $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
                }
            });

            $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page').change(function(){
                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
            });

            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_next").click(function(){
                if( $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page').val() != "<?php if ($_smarty_tpl->tpl_vars['total_rows']->value%$_smarty_tpl->tpl_vars['rows_per_page']->value==0){?><?php echo $_smarty_tpl->tpl_vars['total_rows']->value/$_smarty_tpl->tpl_vars['rows_per_page']->value;?>
<?php }else{ ?><?php echo (($_smarty_tpl->tpl_vars['total_rows']->value-$_smarty_tpl->tpl_vars['total_rows']->value%$_smarty_tpl->tpl_vars['rows_per_page']->value)/$_smarty_tpl->tpl_vars['rows_per_page']->value)+1;?>
<?php }?>")
                {
                    $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page").val(parseInt($('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page').val()) + 1);
                    $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
                }
            });

            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_last").click(function(){
                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page").val("<?php if ($_smarty_tpl->tpl_vars['total_rows']->value%$_smarty_tpl->tpl_vars['rows_per_page']->value==0){?><?php echo $_smarty_tpl->tpl_vars['total_rows']->value/$_smarty_tpl->tpl_vars['rows_per_page']->value;?>
<?php }else{ ?><?php echo (($_smarty_tpl->tpl_vars['total_rows']->value-$_smarty_tpl->tpl_vars['total_rows']->value%$_smarty_tpl->tpl_vars['rows_per_page']->value)/$_smarty_tpl->tpl_vars['rows_per_page']->value)+1;?>
<?php }?>");
                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
            });

            $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_per_page').change(function(){
                $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page').val(1);
                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
            });

            $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_refresh').click(function(){
                $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
            });

            $('.field-sorting').live('click', function(){
                do_sort($(this));

                $(this).parent.live('click', function(){
                    do_sort($(this).children('a'));
                });
            });
        }

        function do_sort($element)
        {
            $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_order_by').val($element.attr('rel'));

            if($element.children('i').hasClass('icon-chevron-up'))
            {
                $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_order_direction').val('DESC');
            }
            else
                $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_order_direction').val('ASC');

            $('#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page').val(1);
            $("#<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar").trigger("submit");
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
		
		
		
        
    <?php /*  Call merged included template "crud/list_table.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("crud/list_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '181324f8081e16f6544-96380549');
content_4f81988dbb6292_36102712($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "crud/list_table.tpl" */?>

        <hr />
        <footer>
			My Footer
        </footer>
    </div>
</body>

</html>
<?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-08 15:54:21
         compiled from "application/views\crud\list_table.tpl" */ ?>
<?php if ($_valid && !is_callable('content_4f81988dbb6292_36102712')) {function content_4f81988dbb6292_36102712($_smarty_tpl) {?><?php if (!is_callable('smarty_function_ci_helper_function')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.ci_helper_function.php';
?><div id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_crud_list">
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
               <th colspan="<?php echo count($_smarty_tpl->tpl_vars['columns']->value)+1;?>
">
                    <?php echo smarty_function_ci_helper_function(array('helper'=>"inflector",'name'=>"plural",'params'=>$_smarty_tpl->tpl_vars['subject']->value),$_smarty_tpl);?>

                    <div class="btn-group pull-right">
                        <a class="btn btn-mini btn-success" href="<?php echo $_smarty_tpl->tpl_vars['add_url']->value;?>
"><i class="icon-plus-sign icon-white"></i> New Subject</a>
                    </div>
               </th>
            </tr>
            <tr class="label label-info">
                <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columns']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
                <th style="width:<?php echo 85/count($_smarty_tpl->tpl_vars['columns']->value);?>
%" class="headerSortDown">
                    <a class="field-sorting" href="#" rel="<?php echo $_smarty_tpl->tpl_vars['column']->value['name'];?>
"><?php if ($_smarty_tpl->tpl_vars['column']->value['name']==$_smarty_tpl->tpl_vars['order_by']->value&&$_smarty_tpl->tpl_vars['order_direction']->value=='DESC'){?><i class="icon-chevron-down icon-white"></i><?php }elseif($_smarty_tpl->tpl_vars['column']->value['name']==$_smarty_tpl->tpl_vars['order_by']->value&&$_smarty_tpl->tpl_vars['order_direction']->value=='ASC'){?><i class="icon-chevron-up icon-white"></i><?php }else{ ?><i class="icon-minus icon-white"></i><?php }?></a>
                    <?php echo $_smarty_tpl->tpl_vars['column']->value['display_as'];?>

                </th>
                <?php } ?>
                <th style="width:15%">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
            <tr>
                <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columns']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
                <td>
                    <?php if (isset($_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['column']->value['name']])){?><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['column']->value['name']];?>
<?php }else{ ?> <?php }?>
                </td>
                <?php } ?>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-mini btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['primary_key']->value];?>
"><i class="icon-pencil icon-white"></i></a>
                        <a class="btn btn-mini btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['primary_key']->value];?>
"><i class="icon-remove icon-white"></i></a>
                    </div>
                </td>
            </tr>
            <?php } ?>
            <tr class="well">
               <th colspan="<?php echo count($_smarty_tpl->tpl_vars['columns']->value)+1;?>
" class="row">
                <div id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_searchbox" style="display: none;">
                    <form class="form-search" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_search">
                        <input name="search" type="text" class="input-medium search-query">
                        <button type="submit" class="btn">Search</button>
                    </form>
                </div>
                <form class="form-search" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_navbar" method="post">
                    <div class="pull-left">
                        <div class="container">
                            <a class="btn btn-info" href="#" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_searchbtn"><i class="icon-search icon-white"></i></a>
                            <div class="input-append">
                                <select id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_per_page" name="per_page" class="span2">
                                    <option value="5" <?php if ($_smarty_tpl->tpl_vars['rows_per_page']->value==5){?>selected="selected"<?php }?>>5&nbsp;&nbsp;</option>
                                    <option value="10" <?php if ($_smarty_tpl->tpl_vars['rows_per_page']->value==10){?>selected="selected"<?php }?>>10&nbsp;&nbsp;</option>
                                    <option value="25" <?php if ($_smarty_tpl->tpl_vars['rows_per_page']->value==25){?>selected="selected"<?php }?>>25&nbsp;&nbsp;</option>
                                    <option value="50" <?php if ($_smarty_tpl->tpl_vars['rows_per_page']->value==50){?>selected="selected"<?php }?>>50&nbsp;&nbsp;</option>
                                    <option value="75" <?php if ($_smarty_tpl->tpl_vars['rows_per_page']->value==75){?>selected="selected"<?php }?>>75&nbsp;&nbsp;</option>
                                    <option value="100" <?php if ($_smarty_tpl->tpl_vars['rows_per_page']->value==100){?>selected="selected"<?php }?>>100&nbsp;&nbsp;</option>
                                </select>
                                <span class="add-on"> per page</span>
                            </div>
                            &nbsp;
                            <a class="btn btn-small" href="#" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_first"><i class="icon-fast-backward"></i></a>
                            <a class="btn btn-small" href="#" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_prev"><i class="icon-step-backward"></i></a>
                            <div class="input-append">
                                <input class="span1" name='page' id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_page" size="6" type="text" value="<?php echo (($_smarty_tpl->tpl_vars['offset_rows']->value-$_smarty_tpl->tpl_vars['offset_rows']->value%$_smarty_tpl->tpl_vars['rows_per_page']->value)/$_smarty_tpl->tpl_vars['rows_per_page']->value)+1;?>
">
                                    <span class="add-on"> of <?php if ($_smarty_tpl->tpl_vars['total_rows']->value%$_smarty_tpl->tpl_vars['rows_per_page']->value==0){?><?php echo $_smarty_tpl->tpl_vars['total_rows']->value/$_smarty_tpl->tpl_vars['rows_per_page']->value;?>
<?php }else{ ?><?php echo (($_smarty_tpl->tpl_vars['total_rows']->value-$_smarty_tpl->tpl_vars['total_rows']->value%$_smarty_tpl->tpl_vars['rows_per_page']->value)/$_smarty_tpl->tpl_vars['rows_per_page']->value)+1;?>
<?php }?></span>
                            </div>
                            <a class="btn btn-small" href="#" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_next"><i class="icon-step-forward"></i></a>
                            <a class="btn btn-small" href="#" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_last"><i class="icon-fast-forward"></i></a>
                            &nbsp;
                            <a class="btn btn-success btn-small" href="#" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_refresh"><i class="icon-refresh icon-white"></i></a>
                            &nbsp;
                            <div class="input-append pull-right">
                                <span class="add-on">Displaying <?php echo $_smarty_tpl->tpl_vars['offset_rows']->value+1;?>
 to <?php if ($_smarty_tpl->tpl_vars['offset_rows']->value+$_smarty_tpl->tpl_vars['rows_per_page']->value>$_smarty_tpl->tpl_vars['total_rows']->value){?><?php echo $_smarty_tpl->tpl_vars['total_rows']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['offset_rows']->value+$_smarty_tpl->tpl_vars['rows_per_page']->value;?>
<?php }?> of <?php echo $_smarty_tpl->tpl_vars['total_rows']->value;?>
</span>
                            </div>
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_order_by" name="order_by" />
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['order_direction']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['unique_control_name']->value;?>
_order_direction" name="order_direction" />
                        </div>
                    </div>
                </form>
               </th>
            </tr>
        </tbody>
    </table>
</div><?php }} ?>