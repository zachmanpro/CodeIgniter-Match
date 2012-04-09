{extends file="../layout.tpl"}
{block name="head"}
{$smarty.block.parent}
        {include_css_once file="{$base_url}assets/jquery/css/chosen.css"}
        {include_js_once file="{$base_url}assets/jquery/jquery.js"}
        {include_js_once file="{$base_url}assets/jquery/jqueryui.js"}
        {include_js_once file="{$base_url}assets/js/jqueryui_config.js"}
        {include_js_once file="{$base_url}assets/tinymce/jquery.tinymce.js"}
        {include_js_once file="{$base_url}assets/js/tinymce_config.js"}
        {include_js_once file="{$base_url}assets/jquery/plugins/jquery.chosen.min.js"}
        {include_js_once file="{$base_url}assets/jquery/plugins/jquery.form.js"}
        {include_js_once file="{$base_url}assets/jquery/plugins/jquery-ui-timepicker-addon.js"}

        <script type="text/javascript">
            $(function(){
                {$unique_control_name}_link_crud_edit_events();
            });

            function {$unique_control_name}_link_crud_edit_events() {

                $("#{$unique_control_name}_edit_form").submit(function(){
                    var this_form = $(this);

                    //$('#{$unique_control_name}_refresh').html('loading...');

                    this_form.ajaxSubmit({
                        url: "{$ajax_update_uri}",
                        success: function($data) {
                            $("#{$unique_control_name}_crud_edit").html($data);
                            {$unique_control_name}_link_crud_edit_events();
                            load_tinymce_adv();
                            load_tinymce_simple();
                        }
                    })
                    return false;
                });
            }
        </script>
{/block}
{block name=body}
    {include file="crud/edit_form.tpl"}
{/block}
