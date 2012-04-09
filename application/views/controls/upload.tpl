<div class="control-group{if {ci_form_validation field={$field.name} error='true'} != ''} error{/if}">
    <label class="control-label" for="{$field.name}">{$field.display_as}</label>
    <div class="controls">
        <input type="text" class="input-xlarge" id="{$field.name}" name="{$field.name}" />
        {if {ci_form_validation field={$field.name} error='true'} != ''}
            <p class="help-inline">{ci_form_validation field={$field.name} error='true'}</p>
        {/if}
    </div>
</div>
