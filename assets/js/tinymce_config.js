function load_tinymce_simple()
{
    $('textarea.texteditor').tinymce({
        // Location of TinyMCE script
        script_url : base_url + 'assets/tinymce/tiny_mce.js',

        // General options
        theme : "simple",
        plugins : "pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,advlist",
    });
}


function load_tinymce_adv()
{
        $('textarea.texteditor_adv').tinymce({

        // Location of TinyMCE script
        script_url : base_url + 'assets/tinymce/tiny_mce.js',

        // General options
        theme : "advanced",
        plugins : "pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,advlist",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,pagebreak",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        /*
        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",
        */
        // Drop lists for link/image/media/template dialogs
        //template_external_list_url : base_url+'assets/grocery_crud/texteditor/lists/template_list.js',
        //external_link_list_url : base_url+"assets/grocery_crud/texteditor/lists/link_list.js",
        //external_image_list_url : base_url+"assets/grocery_crud/texteditor/lists/image_list.js",
        //media_external_list_url : base_url+"assets/grocery_crud/texteditor/lists/media_list.js",

        // Replace values for the template plugin
        //template_replace_values : {
        //	username : "Some User",
        //	staffid : "991234"
        //}
    });

}


$().ready(function() {

    load_tinymce_simple();
    load_tinymce_adv();
});