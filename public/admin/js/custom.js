
/*
Author: Acit Jazz
Version: 1.0
*/
/*
Authors: Acit Jazz || chit.eureka@gmail.com
*/
snippet.removeMedia();
snippet.destroyPost();
snippet.addToTrash();
snippet.uploadMedia();
$('.findPlace').on('change', function () {
    snippet.findPlace(this);
});
//Alert Message
function alertMessage(message, type){
    var alertMessage = '<div class="alert alert-'+type+'" role="alert">'+
                       '<button type="button" class="close" data-dismiss="alert">'+
                       '<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+message+
                      '</div>'; 
    return alertMessage;
}
// hide ALert
function alertHide(){
  $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
 });
}

function ConfirmDelete(){
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
}
function ConfirmBtn(){
  var x = confirm("Are you sure?");
  if (x)
    return true;
  else
    return false;
}

$(function () {
	$('.btnclose').click(function(){
    var magnificPopup = $.magnificPopup.instance;
		magnificPopup.close();
	});
  //Initialize Select2 Elements
  $(".select2").select2();
  //Datemask dd/mm/yyyy
  $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  //Datemask2 mm/dd/yyyy
  $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
  //Money Euro
  $("[data-mask]").inputmask();
  $(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd'
  });
  $(".alldatepicker").datepicker({
      yearRange: "1970:2016",
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
  });
  $('#color').paletteColorPicker({
    position: 'downside', // default -> 'upside'
  });
  //Date range picker
  $('#reservation').daterangepicker();
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
  $('#published_at').datetimepicker({
                    format: 'YYYY-MM-DD h:mm A'
                });
  $('.datetime').datetimepicker({
                    format: 'YYYY-MM-DD h:mm A'
                });
  //Date range as a button
  $('#daterange-btn').daterangepicker(
      {
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
  function (start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  }
  );

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red'
  });
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  //Colorpicker
  $(".colorpicker").colorpicker();
  //color picker with addon
  $(".my-colorpicker2").colorpicker();

  //Timepicker
  $(".timepicker").timepicker({
    showInputs: false
  });
  //bootstrap WYSIHTML5 - text editor
  $(".textarea").wysihtml5();
});
$(document).ready(function() {
    //Popup

$('#colors').paletteColorPicker({
  colors: [
    {"red": "#f80000"},
    {"lightred": "#f25c5c"},
    {"pink": "#c90899"},
    {"green": "#499e1f"},
    {"lightgreen": "#00ad84"},
    {"blue": "#225aaf"},
    {"lightblue": "#239daf"},
    {"purple": "#872aa3"},
    {"orange": "#D86900"},
    {"lightorange": "#f4b042"},
    {"yellow": "#E6DE00"},
    {"gold": "#a27229"},
    {"magenta": "#ad0064"},
    {"chocolate": "#ad2800"},
    {"lightmagenta": "#f44141"},
    {"grey": "#666"},
    {"darkgrey": "#333"},
  ],
  position: 'downside', // default -> 'upside'
});
    $('.showPopup').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });
	//Plus Minus
    $('.btn-number').click(function(e){
      e.preventDefault();
          fieldName = $(this).attr('data-field');
          type      = $(this).attr('data-type');
          var input = $("input[name='"+fieldName+"']");
          var currentVal = parseInt(input.val());
          if (!isNaN(currentVal)) {
              if(type == 'minus') {

                  if(currentVal > input.attr('min')) {
                      input.val(currentVal - 1).change();
                  }
                  if(parseInt(input.val()) == input.attr('min')) {
                      $(this).attr('disabled', true);
                  }

              } else if(type == 'plus') {

                  if(currentVal < input.attr('max')) {
                      input.val(currentVal + 1).change();
                  }
                  if(parseInt(input.val()) == input.attr('max')) {
                      $(this).attr('disabled', true);
                  }

              }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }

    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

