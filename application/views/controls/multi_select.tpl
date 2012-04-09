<div class="control-group{if {ci_form_validation field={$field.name} error='true'} != ''} error{/if}">
    <label class="control-label" for="{$field.name}">{$field.display_as}</label>
    <div class="controls">
        <select data-placeholder="Choose {$field.display_as}..." class="chzn-select" id="{$field.name}" name="{$field.name}[]" multiple="multiple">
            <option value=""></option>
            {foreach $field.options as $option}
            <option value="{$option.value}" {if isset($field.value) && $option.value == $field.value}selected="selected"{/if}>{$option.label}</option>
            {/foreach}
        </select>
        {if {ci_form_validation field={$field.name} error='true'} != ''}
            <p class="help-inline">{ci_form_validation field={$field.name} error='true'}</p>
        {/if}
    </div>
</div>