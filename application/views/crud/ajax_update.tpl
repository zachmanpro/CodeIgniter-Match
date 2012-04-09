{if $success}
<div class="alert alert-success">
    <strong>Success</strong> <br />
    {$subject} successfully updated. <br />
    <br />
    <a class="btn" href="{$list_url}">Back to {$subject} list.</a>
</div>
{else}
<div class="alert alert-error">
    <strong>Error</strong> <br />
    Something went wrong while updateing {$subject}, please try again or contact support. <br />
    <br />
    <a class="btn" href="{$list_url}">Back to {$subject} list.</a>
</div>

{/if}