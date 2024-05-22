// A $( document ).ready() block.

// $("#manageUsers").click(function(){
//     var dataUrl = $(this).attr("data-url");
    
//     $.ajax({
//         method:'get',
//         url:dataUrl,
        
//         success:function(data){
//             console.log(data);
//          // var result = JSON.parse(data);
//         //   if(result['code']=='200'){
       
//         //   }else if(result['code']=='302'){
//         //     $(".Btn").html('Save');
//         //      Swal.fire({title: "Error!", text: result['msg'], icon: 'error'});
//         //   }else if(result['code']=='303'){
//         //     $(".Btn").html('Save');
//         //      Swal.fire({title: "Error!", text: result['msg'], icon: 'error'});
//         //   }
//         },
//         error:function(data){console.log('error: '+data.responseText);}
//       });
//   });

var date_job=""; var state_job=""; var city_job=""; var keyword="All";
  function jsonMessage(response,message,title="")
{
    //jsonMessage=JSON.parse(jsonMessage);
    //var text= ;
   var text=message;
    if(title=="")
      title=response;
  
    swal({
        html:text,
        title: title,
        text:text,
        type: response,
        confirmButtonText: "close"
       }).catch(swal.noop);
   
}
function jsonMessage2(response,message,title="")
{
  toastr[response](message, title);
}
$(document).on({
  ajaxStart: function(){
      $("#preloader1").css("display","block")
      $("#status1").css("display","block")
      
  },
  ajaxStop: function(){ 
      $("#preloader1").css("display","none")
      $("#status1").css("display","none")
  }    
})


function isJSON(str) {
  try {
      JSON.parse(str);
  } catch (e) {
      return false;
  }
  return true;
}

function printErrorMsg (msg) {
  $(".print-error-msg").find("ul").html('');
  $(".print-error-msg").css('display','block');
  $.each( msg, function( key, value ) {
      $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
  });
}

function printErrorMsg1 (msg) {
  $(".print-error-msg1").find("ul").html('');
  $(".print-error-msg1").css('display','block');
  $.each( msg, function( key, value ) {
      $(".print-error-msg1").find("ul").append('<li>'+value+'</li>');
  });
}


$(function() {
       
  var $form = $(".require-validation");
 
  $('.require-validation').bind('submit', function(e) {
     
      var $form     = $(".require-validation"),
      inputSelector = ['input[type=email]', 'input[type=password]',
                       'input[type=text]', 'input[type=file]',
                       'textarea'].join(', '),
      $inputs       = $form.find('.required').find(inputSelector),
      $errorMessage = $form.find('div.error'),
      valid         = true;
      $errorMessage.addClass('hide');

      $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
          $errorMessage.removeClass('hide');
          e.preventDefault();
        }
      });
 
      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
      
});

function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
           token = response['id']; 
          stripe="verified" ;
          if(stripe=='verified')
          {
            $(".require-validation").css("display","none");
            $(".stripe-success").css("display","block")
          }  
          
      }
  }
 
});













