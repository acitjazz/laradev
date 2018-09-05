var form = $("#updateprofile");
form.validate({
  rules: {
    name: {
      required: true,
      minlength: 2
    },
    email: {
      required: true,
      email: true
    },
    phone: {
      required: true,
      number: true
    },
  },
  messages: {
    name: {
      required: "Please enter your name",
      minlength: "Your name must consist of at least 2 characters"
    },
    email: "Please enter a valid email address",
    phone: {
      required: "Please enter your phone number",
    },
  },
  submitHandler: function (form,values) {
      var values = $(form).serializeArray();
      $('#loaderUpdate').removeClass("hide");
      var data = values;
      console.log('data ='+data)
      $.ajax({
        method: "POST",
        url: base_url+"/update-profile",
        timeout: 30000, //Set your timeout value in milliseconds or 0 for unlimited
        data : $.param(data)
      }).done(function(data) {
        $('#loaderUpdate').addClass("hide");
         console.log(data);
        $('#popup-text').html(data.message);
         common.popup('message');
      }).fail(function (jqXHR, textStatus, errorThrown) {
            $('#loaderUpdate').hide();
            $('#popup-text').html(data.message);
             common.popup('message');
        });
      return false;
  }
});
