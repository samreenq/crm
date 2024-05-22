@extends("layout")
  

                   
                       
                  
                    


@section ('body_container')
<!-- MultiStep Form -->
<style>
    * {
        margin: 0;
        padding: 0;
    }
    
    html {
        height: 100%;
    }
    
    /*Background color*/
    #grad1 {
        background-color: : #9C27B0;
        background-image: linear-gradient(120deg, #FF4081, #81D4FA);
    }
    
    /*form styles*/
    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
    }
    
    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;
    
        /*stacking fieldsets above each other*/
        position: relative;
    }
    
    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
    
        /*stacking fieldsets above each other*/
        position: relative;
    }
    
    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }
    
    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E;
    }
    
    #msform input, #msform textarea {
        padding: 0px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px;
    }
    
    #msform input:focus, #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid skyblue;
        outline-width: 0;
    }
    
    /*Blue Buttons*/
    #msform .action-button {
        width: 100px;
        background: skyblue;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }
    
    #msform .action-button:hover, #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
    }
    
    /*Previous Buttons*/
    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }
    
    #msform .action-button-previous:hover, #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
    }
    
    /*Dropdown List Exp Date*/
    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px;
    }
    
    select.list-dt:focus {
        border-bottom: 2px solid skyblue;
    }
    
    /*The background card*/
    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative;
    }
    
    /*FieldSet headings*/
    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left;
    }
    
    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey;
    }
    
    #progressbar .active {
        color: #000000;
    }
    
    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 33%;
        float: left;
        position: relative;
    }
    
    /*Icons in the ProgressBar*/
    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f023";
    }
    
    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007";
    }
    
    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d";
    }
    
    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c";
    }
    
    /*ProgressBar before any progress*/
    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px;
    }
    
    /*ProgressBar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1;
    }
    
    /*Color number of the step and the connector before it*/
    #progressbar li.active:before, #progressbar li.active:after {
        background: skyblue;
    }
    
    /*Imaged Radio Buttons*/
    .radio-group {
        position: relative;
        margin-bottom: 25px;
    }
    
    .radio {
        display:inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor:pointer;
        margin: 8px 2px; 
    }
    
    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
    }
    
    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
    }
    
    /*Fit image in bootstrap div*/
    .fit-image{
        width: 100%;
        object-fit: cover;
    }
    </style>

@push("custom-scripts")

<script>
    var stripe=null,c_name="",c_email="", user_id={{ $id }}, token="";
    $(document).ready(function(){
        
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){
        if (document.getElementById('c_name') instanceof Object){
            c_name=$("#c_name").val();
            c_email=$("#c_email").val();
            if(c_name =="" || c_email=="")
            {
                alert("Please Fill the Fields before proceeding to next Step");
                return false;
            }
            var testEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if( !testEmail.test(c_email))
            {
                alert("Please Insert Valid Email, before proceeding to the next Step");
                return false;
            }
        }
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    
    $(".previous").click(function(){
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
    
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    });

    $(".make_payment").click(function(){
   
      if(stripe!="verified")
      {
        alert("please verify your card, before confirming it, Thank you!");
        return false;
      }

      make_payment(stripe,token,c_name,c_email,user_id);
      
    });

    </script>
    
@endpush

    
    
    <div class="container-fluid" >
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>This Questionnaire Charges $25/Month</strong></h2>
                    <p>Fill all form field to go to next step</p>
                    <div class="row">
                        <div class="col-md-12 mx-0" id="msform">
                           
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Company Information</strong></li>
                                   
                                    <li id="payment"><strong>Payment</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Company Information</h2>
                                        <input type="text" name="c_name" id="c_name" class="mb-2 mt-2" placeholder="Enter Company Name"/>
                                        <input type="email" name="c_email" id="c_email" class="mb-2 mt-2" placeholder="Enter Company Email "/>
                                        
                                       
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next Step"/>
                                </fieldset>
                               
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Payment Information</h2>
                                            @include("web.plans.include.stripe_plan")
                                    
                                        
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                    <input type="button" name="make_payment" class=" action-button make_payment "   value="Confirm"/>
                                </fieldset>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   

@endsection