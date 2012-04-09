<?php /* Smarty version Smarty-3.1-DEV, created on 2012-04-08 15:54:31
         compiled from "application/views\crud\list_table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138724f8098201b4028-35476277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34cd2398ea3b7f7ac0c726d3e9e4a1cd5cd6ccbf' => 
    array (
      0 => 'application/views\\crud\\list_table.tpl',
      1 => 1333893250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138724f8098201b4028-35476277',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_4f8098202ffc06_63865301',
  'variables' => 
  array (
    'unique_control_name' => 0,
    'columns' => 0,
    'subject' => 0,
    'add_url' => 0,
    'column' => 0,
    'order_by' => 0,
    'order_direction' => 0,
    'list' => 0,
    'row' => 0,
    'edit_url' => 0,
    'primary_key' => 0,
    'rows_per_page' => 0,
    'offset_rows' => 0,
    'total_rows' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f8098202ffc06_63865301')) {function content_4f8098202ffc06_63865301($_smarty_tpl) {?><?php if (!is_callable('smarty_function_ci_helper_function')) include 'C:\\xampp\\htdocs\\wu_crud_test\\application\\third_party\\smarty\\plugins\\function.ci_helper_function.php';
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