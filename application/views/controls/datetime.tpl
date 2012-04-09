<div class="control-group{if {ci_form_validation field={$field.name} error='true'} != ''} error{/if}">
    <label class="control-label" for="{$field.name}">{$field.display_as}</label>
    <div class="controls">
        <input type="text" class="datetime-input" maxlength="19" {if isset($field.value)}value="{$field.value}"{/if} id="{$field.name}" name="{$field.name}" />
        <button class='btn btn-mini date-input-clear'><i class="icon-remove"></i></button>
        {if {ci_form_validation field={$field.name} error='true'} != ''}
            <p class="help-inline">{ci_form_validation field={$field.name} error='true'}</p>
        {/if}
    </div>
</div>
