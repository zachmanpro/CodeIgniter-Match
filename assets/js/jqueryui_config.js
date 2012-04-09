$(function(){
  $('.date-input').datepicker({
      userLang	: 'en',
      americanMode: false,
      dateFormat: 'yy-mm-dd'
  });

  $('.datetime-input').datetimepicker({
      userLang: 'en',
      americanMode: false,
      dateFormat: 'yy-mm-dd',
      showSecond: true,
      timeFormat: 'hh:mm:ss'
  });


  $('.date-input-clear').button();

  $('.date-input-clear').click(function(){
      $(this).parent().find('.date-input').val("");
      return false;
    });

  $(".chzn-select").chosen({allow_single_deselect:true});

});