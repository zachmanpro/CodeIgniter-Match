<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='UTF-8' />
	<title>{block name=title}My Page{/block}</title>
	<!--[if IE]>
		{include_js_once file="http://html5shiv.googlecode.com/svn/trunk/html5.js"}
	<![endif]-->
	{include_css_once file="{$base_url}assets/bootstrap/css/bootstrap.css"}
	{include_css_once file="{$base_url}assets/bootstrap/css/bootstrap-responsive.css"}
	{include_css_once file="{$base_url}assets/jquery/css/uistyle.css"}

	{include_js_once file="{$base_url}assets/jquery/jquery.js"}
	{include_js_once file="{$base_url}assets/jquery/jqueryui.js"}
	{include_js_once file="{$base_url}assets/bootstrap/js/bootstrap.js"}

    {block name=head}
	<script type="text/javascript">
		var base_url = "{$base_url}";
	</script>
	{/block}
</head>

<body>
    <div class="container">
		<header>
			My Header
		</header>
		<hr />
		{block name=menu}
		{if isset($menu)}
			{$menu}
		{/if}
		{/block}
		{block name=banner}
		{/block}
        {block name=body}{/block}
        <hr />
        <footer>
			My Footer
        </footer>
    </div>
</body>

</html>
