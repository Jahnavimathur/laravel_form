$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
$(document).ready(function(){
  jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-zA-Z'. ]+$/i.test(value);
  }, "*Letters only please");
});


  $("#yourform").validate({
      ignore: [],
      rules:{
          sku: {
              required: true,
              lettersonly:true,
          },
          title: {
              required: true,
              lettersonly:true
          },
          capacity:{
              required:true,
              digits: true
          },
          openingstock:{
              required:true,
              digits: true
          },
          bufferstock:{
              required:true,
              digits: true,
          },
          unit:{
              required:true
          },
          "item[]":{
              required:true,
              lettersonly:true
          },
          "quantity[]":{
            required:true,
            digits: true
        },
      },messages: {
        sku: {
              required: "*Please enter SKU"
          },
          title: {
              required: "*Please enter Title"
          },
          capacity:{
              required:"*Please enter Capacity"
          },
          openingstock:{
              required:"*Please enter Opening Stock"
          },
          bufferstock:{
              required:"*Please enter Buffer Stock"
          },
          unit:{
              required:"*Select unit"
          },
          "item[]":{
              required:"*Please enter Item"
          },
          "quantity[]":{
              required:"*Please enter item quantity",
          }
      },
      submitHandler:function(form){
        $.ajax({
            url:'/form1',
            type:'POST',
            processData: false,
            enctype: 'multipart/form-data',
            data:jQuery('#yourform').serialize(),
           
          });
      }
      
  });

