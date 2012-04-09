<div id="{$unique_control_name}_crud_list">
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
               <th colspan="{$columns|@count + 1}">
                    {ci_helper_function helper="inflector" name="plural" params=$subject}
                    <div class="btn-group pull-right">
                        <a class="btn btn-mini btn-success" href="{$add_url}"><i class="icon-plus-sign icon-white"></i> New {$subject}</a>
                    </div>
               </th>
            </tr>
            <tr class="label label-info">
                {foreach from=$columns item=column}
                <th style="width:{85/$columns|@count}%" class="headerSortDown">
                    <a class="field-sorting" href="#" rel="{$column.name}">{if $column.name == $order_by && $order_direction == 'DESC'}<i class="icon-chevron-down icon-white"></i>{elseif $column.name == $order_by && $order_direction == 'ASC'}<i class="icon-chevron-up icon-white"></i>{else}<i class="icon-minus icon-white"></i>{/if}</a>
                    {$column.display_as}
                </th>
                {/foreach}
                <th style="width:15%">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$list item=row}
            <tr>
                {foreach from=$columns item=column}
                <td>
                    {if isset($row.{$column.name})}{$row.{$column.name}}{else} {/if}
                </td>
                {/foreach}
                <td>
                    <div class="btn-group">
                        <a class="btn btn-mini btn-primary" href="{$edit_url}{$row.$primary_key}"><i class="icon-pencil icon-white"></i></a>
                        <a class="btn btn-mini btn-danger" href="{$delete_url}{$row.$primary_key}"><i class="icon-remove icon-white"></i></a>
                    </div>
                </td>
            </tr>
            {/foreach}
            <tr class="well">
               <th colspan="{$columns|@count + 1}" class="row">
                <div id="{$unique_control_name}_searchbox" style="display: none;">
                    <form class="form-search" id="{$unique_control_name}_search">
                        <input name="search" type="text" class="input-medium search-query">
                        <button type="submit" class="btn">Search</button>
                    </form>
                </div>
                <form class="form-search" id="{$unique_control_name}_navbar" method="post">
                    <div class="pull-left">
                        <div class="container">
                            <a class="btn btn-info" href="#" id="{$unique_control_name}_searchbtn"><i class="icon-search icon-white"></i></a>
                            <div class="input-append">
                                <select id="{$unique_control_name}_per_page" name="per_page" class="span2">
                                    <option value="5" {if $rows_per_page == 5}selected="selected"{/if}>5&nbsp;&nbsp;</option>
                                    <option value="10" {if $rows_per_page == 10}selected="selected"{/if}>10&nbsp;&nbsp;</option>
                                    <option value="25" {if $rows_per_page == 25}selected="selected"{/if}>25&nbsp;&nbsp;</option>
                                    <option value="50" {if $rows_per_page == 50}selected="selected"{/if}>50&nbsp;&nbsp;</option>
                                    <option value="75" {if $rows_per_page == 75}selected="selected"{/if}>75&nbsp;&nbsp;</option>
                                    <option value="100" {if $rows_per_page == 100}selected="selected"{/if}>100&nbsp;&nbsp;</option>
                                </select>
                                <span class="add-on"> per page</span>
                            </div>
                            &nbsp;
                            <a class="btn btn-small" href="#" id="{$unique_control_name}_first"><i class="icon-fast-backward"></i></a>
                            <a class="btn btn-small" href="#" id="{$unique_control_name}_prev"><i class="icon-step-backward"></i></a>
                            <div class="input-append">
                                <input class="span1" name='page' id="{$unique_control_name}_page" size="6" type="text" value="{(($offset_rows - $offset_rows % $rows_per_page) / $rows_per_page) + 1}">
                                    <span class="add-on"> of {if $total_rows % $rows_per_page == 0}{$total_rows / $rows_per_page}{else}{(($total_rows - $total_rows % $rows_per_page) / $rows_per_page) + 1}{/if}</span>
                            </div>
                            <a class="btn btn-small" href="#" id="{$unique_control_name}_next"><i class="icon-step-forward"></i></a>
                            <a class="btn btn-small" href="#" id="{$unique_control_name}_last"><i class="icon-fast-forward"></i></a>
                            &nbsp;
                            <a class="btn btn-success btn-small" href="#" id="{$unique_control_name}_refresh"><i class="icon-refresh icon-white"></i></a>
                            &nbsp;
                            <div class="input-append pull-right">
                                <span class="add-on">Displaying {$offset_rows + 1} to {if $offset_rows + $rows_per_page > $total_rows}{$total_rows}{else}{$offset_rows + $rows_per_page}{/if} of {$total_rows}</span>
                            </div>
                            <input type="hidden" value="{$order_by}" id="{$unique_control_name}_order_by" name="order_by" />
                            <input type="hidden" value="{$order_direction}" id="{$unique_control_name}_order_direction" name="order_direction" />
                        </div>
                    </div>
                </form>
               </th>
            </tr>
        </tbody>
    </table>
</div>