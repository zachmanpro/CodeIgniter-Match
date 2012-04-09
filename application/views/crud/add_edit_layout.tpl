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
{/block}
{block name=body}
    {include file="crud/edit_form.tpl"}
{/block}