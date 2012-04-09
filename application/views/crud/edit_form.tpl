<div id="{$unique_control_name}_crud_edit">
<form class="form-horizontal" method="post" id="{$unique_control_name}_edit_form">
  <fieldset>
    <legend>Edit {$subject}</legend>
    {foreach from=$fields item=field}
        {append var='field' value=$row.{$field.name} index="value"}
        {include file="controls/{$field.type}.tpl"}
    {/foreach}
    <div class="form-actions">
        <button type="submit" class="btn btn-primary" id="{$unique_control_name}_submit">Update {$subject}</button>
        <a class="btn" href="{$list_url}">Cancel</a>
    </div>
  </fieldset>
</form>
</div>