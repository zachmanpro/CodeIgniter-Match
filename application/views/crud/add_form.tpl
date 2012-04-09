<div id="{$unique_control_name}_crud_add">
<form class="form-horizontal"  method="post" id="{$unique_control_name}_add_form">
  <fieldset>
    <legend>Add {$subject}</legend>
    {foreach from=$fields item=field}
        {include file="controls/{$field.type}.tpl"}
    {/foreach}
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Add {$subject}</button>
        <button class="btn">Cancel</button>
    </div>
  </fieldset>
</form>
</div>