<div class="control-group{if {ci_form_validation field={$field.name} error='true'} != ''} error{/if}">
    <label class="control-label" for="{$field.name}">{$field.display_as}</label>
    <div class="controls">
        <textarea class="input-large" id="{$field.name}" name="{$field.name}">{if isset($field.value)}value="{$field.value}"{/if}</textarea>
        {if {ci_form_validation field={$field.name} error='true'} != ''}
            <p class="help-inline">{ci_form_validation field={$field.name} error='true'}</p>
        {/if}
    </div>
</div>