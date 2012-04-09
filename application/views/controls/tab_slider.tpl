<script type="text/javascript">
    function {$field.name}_select_tab(num)
    {
        // Slider
        $('#{$field.name}_tab_slider').slider("value", num);

        // Body
        $(".{$field.name}_body").hide();
        $("#{$field.name}_body"+num).show();

        // Tab
        $(".{$field.name}_tab_sliderlabel").removeClass("selected");
        $("#{$field.name}_tab"+num).addClass("selected");

        // Save selected tab - if needed
        $("#{$field.name}_tab_slider_value").val(num);

        // if there is a callback call it
        if(typeof on_{$field.name}_slide == 'function')
        {
              on_{$field.name}_slide();
        }
    }

    var {$field.name}_tab_count = {count($tabs)};

    $(function(){
        $("#{$field.name}_tab_slider").slider({
            min: 0,
            max: {$field.name}_tab_count - 1,
            value: 0,
            range: "min",
            slide: function(event, ui){
                        {$field.name}_select_tab(ui.value);
                    }
            });

        var width = $("#{$field.name}_tab_slider").width() / {$field.name}_tab_count;
        $("#{$field.name}_tab_slider").width(width * ({$field.name}_tab_count - 1) + 'px');
        $(".{$field.name}_tab_sliderlabel").width(width + 'px');
        {$field.name}_select_tab(0);
    });
</script>
<style type="text/css">
    .sliderlabel {
        float: left;
        margin-top: 10px;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
    }

    .sliderlabel {
        color: #000;
    }
    .sliderlabel:hover {
        cursor: pointer;
    }
    .sliderlabel.selected {
        color: #ff6600;
    }
</style>
<div class="{$field.name}" style="padding-top:15px;">
    <div align="center" style="">
        <div id="{$field.name}_tab_slider"></div>
    </div>

    <input type="hidden" id="{$field.name}_tab_slider_value" name="{$field.name}_tab_slider_value" value="0">

    <div style="padding-bottom: 3em;">
    {foreach $tabs as $key=>$tab}
        <div class="sliderlabel {$field.name}_tab_sliderlabel" id="{$field.name}_tab{$key}" onclick="{$field.name}_select_tab('{$key}')">{$tab}</div>
    {/foreach}
    </div>

    <div style="padding-bottom: 1em;">
    {foreach $bodies as $key=>$body}
        <div class="{$field.name}_body" id="{$field.name}_body{$key}">
            <div class="description">
                {$body}
            </div>
        </div>
    {/foreach}
    </div>
</div>