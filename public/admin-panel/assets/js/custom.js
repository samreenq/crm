


  function jsonMessage(response,message,title="")
  {
    var text=message;
      if(title=="")
      {
        title=response;
      }
    
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
  
  if(!isNaN(str))return false;
   
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

function saveOrder(){
  var list = new Array();
          $('#sortable').find('.ui-state-default').each(function(){
          var id=$(this).attr('data-id');
          list.push(id);
        });
        var post_list_value=list.join(',');

        $("#sequence_ingredents").val(post_list_value);


}


  function verifyEmail(verificationDesc,email,url)
{
    var text= verificationDesc + "<br><br>" + "<b style='font-weight: bold !important;'>"+email + "</b>";
    text+="<br><hr>";
    text+="<a href='"+url+"' class='btn btn-warning' style='width: 100%;' > Resend Mail </a>";
    
    swal({
        html:true,
        title: "Please Verify Your Email Address",
        text: text,
        type: "warning",
        confirmButtonText: "close"
       });
   
}

