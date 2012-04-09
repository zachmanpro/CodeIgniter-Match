<div id="{$unique_control_name}_form">
<form class="form-horizontal" method="post" id="{$unique_control_name}_add_form">
  <fieldset>
    <legend>{$subject}</legend>
    {foreach from=$fields item=field}
        {append var='field' value=$row.{$field.name} index="value"}
        {include file="controls/{$field.type}.tpl"}
    {/foreach}
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">{$submit_label}</button>
    </div>
  </fieldset>
</form>
</div>