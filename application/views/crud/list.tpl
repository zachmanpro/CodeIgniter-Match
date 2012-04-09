{extends file="../layout.tpl"}
{block name=head}
{$smarty.block.parent}
    {include_js_once file="{$base_url}assets/jquery/plugins/jquery.form.js"}
    <script type="text/javascript">
        $(function(){
            {$unique_control_name}_link_crud_list_events();
        });

        function {$unique_control_name}_link_crud_list_events()
        {
            $('a#{$unique_control_name}_searchbtn').click(function(){
                $('#{$unique_control_name}_searchbox').toggle();
                return false;
            });

            $("#{$unique_control_name}_navbar").submit(function(){
                //alert('Here');
                var this_form = $(this);

                $('#{$unique_control_name}_refresh').html('loading...');

                this_form.ajaxSubmit({
                    url: "{$ajax_list_uri}",
                    success: function($data) {
                        //alert($data);
                        $('#{$unique_control_name}_crud_list').html($data);
                        {$unique_control_name}_link_crud_list_events();
                    }
                })
                return false;
            });

            $("#{$unique_control_name}_first").click(function(){
                $("#{$unique_control_name}_page").val(1);
                $("#{$unique_control_name}_navbar").trigger("submit");
            });

            $("#{$unique_control_name}_prev").click(function(){
                if( $('#{$unique_control_name}_page').val() != "1")
                {
                    $("#{$unique_control_name}_page").val(parseInt($('#{$unique_control_name}_page').val()) - 1);
                    $("#{$unique_control_name}_navbar").trigger("submit");
                }
            });

            $('#{$unique_control_name}_page').change(function(){
                $("#{$unique_control_name}_navbar").trigger("submit");
            });

            $("#{$unique_control_name}_next").click(function(){
                if( $('#{$unique_control_name}_page').val() != "{if $total_rows % $rows_per_page == 0}{$total_rows / $rows_per_page}{else}{(($total_rows - $total_rows % $rows_per_page) / $rows_per_page) + 1}{/if}")
                {
                    $("#{$unique_control_name}_page").val(parseInt($('#{$unique_control_name}_page').val()) + 1);
                    $("#{$unique_control_name}_navbar").trigger("submit");
                }
            });

            $("#{$unique_control_name}_last").click(function(){
                $("#{$unique_control_name}_page").val("{if $total_rows % $rows_per_page == 0}{$total_rows / $rows_per_page}{else}{(($total_rows - $total_rows % $rows_per_page) / $rows_per_page) + 1}{/if}");
                $("#{$unique_control_name}_navbar").trigger("submit");
            });

            $('#{$unique_control_name}_per_page').change(function(){
                $('#{$unique_control_name}_page').val(1);
                $("#{$unique_control_name}_navbar").trigger("submit");
            });

            $('#{$unique_control_name}_refresh').click(function(){
                $("#{$unique_control_name}_navbar").trigger("submit");
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
            $('#{$unique_control_name}_order_by').val($element.attr('rel'));

            if($element.children('i').hasClass('icon-chevron-up'))
            {
                $('#{$unique_control_name}_order_direction').val('DESC');
            }
            else
                $('#{$unique_control_name}_order_direction').val('ASC');

            $('#{$unique_control_name}_page').val(1);
            $("#{$unique_control_name}_navbar").trigger("submit");
        }

    </script>
{/block}
{block name=body}
    {include file="crud/list_table.tpl"}
{/block}