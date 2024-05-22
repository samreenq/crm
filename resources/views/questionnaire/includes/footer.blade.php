<style>
   /*footer start*/

   footer {
     background-color: #7393B3;
     padding: 60px 30px 90px 0;
     background-image: url('../../custom/assets/images/footer-grass.png');
     background-repeat: no-repeat;
     background-position: bottom center;
     background-size: contain;
     height: 506px;
   }
   .newsletr h6 {
       color: #000;
       font-family: "Poppins";
       font-size: 32px;
       font-style: normal;
       font-weight: 600;
       line-height: 50px;
   }
   .newsletr p {
       color: #FFF;
       font-family: "Poppins";
       font-size: 21px;
       font-style: normal;
       font-weight: 200;
       margin-top: 7px;
       line-height: 30px;
   }
   .newsletr input[type="email"] {
       font-family: "Poppins";
       width: 97.5%;
       height: 63px;
       padding: 3px 55px 1px 21px;
       margin-top: 1.3rem;
       border: 2px solid #fff;
       background: transparent;
       border-radius: 15px;
       color: #fff;
       font-size: 15px;
   }
   button.env-btn {
       background: TRANSPARENT;
       color: #fff;
       border: none;
   }
   .newsletr h5, a {
       color: #000000;
       font-family: "Poppins";
       font-size: 16px;
       font-style: normal;
       font-weight: 500;
       line-height: 30px;
       margin-bottom: 0.3rem;
   }

   button.env-btn i {
       position: absolute;
       top: 132px;
       right: 50px;
   }

   .newsletr h5 a i {
       color: #ffffff;
       padding: 5px 6px;
       font-size: 15px;
       margin-left: 7px;
   }

   .copyright p {
       text-align: center;
       font-size: 17px;
       font-style: normal;
       font-weight: 500;
       line-height: 30px;
       margin-bottom: 1rem;
   }

   .footer-logos img {
       width: 50%;
   }

   .newsletr h5:before {About Us
       content: "";
       background: #ffffff;
       border: none;
       position: absolute;
       width: 100%;
       height: 2px;
       left: 5%;
       top: 30%;
   }

   .flogo {
     text-align: right;
   }

   .copyright.text-center {
     font-size: 14px;
     padding-top: 30px;
     padding-bottom: 30px;
     color: #fff;
     background: #000;
   }

   .copyright.text-center p {
     text-transform: capitalize;
   }

   .footerLinks a {
     color: #fff;
     text-transform: capitalize;
     font-size: 14px;
   }

   .contactDetail li {
     color: #fff;
     text-transform: capitalize;
     font-size: 14px;
   }

   /*footer end*/
   </style>
   <footer >
       <div class="container pt-4">
           <div class="row pt-4">
               <div class="col-lg-3 col-md-6">
                   <div class="footer-logos">
                       <a href="https://stage234.devdesignbuild.com/"><img src="{{ URL::asset('custom/assets/images/footer-icon.png') }}"
                               alt=""></a>
                   </div>
               </div>
               <div class="col-lg-1 col-md-0"></div>
               <div class="col-lg-4 col-md-6">
                   <div class="newsletr">
                       <h6>News Letter</h6>
                       <p> Sign up here!</p>
                       <form action="">
                           <input type="email" placeholder="Email">
                           <!-- <input type="submit"> -->
                           <button type="submit" class="env-btn">
                               <i class="far fa-envelope"></i>
                           </button>
                       </form>
                   </div>
               </div>

               <div class="col-lg-4 col-md-6">
                   <div class="newsletr">
                       <h6>Drop us a line!</h6>
                       <h5 class="mt-5">
                           <a href="mailto:gracegreenman@gmail.com"><i class="far fa-envelope"></i>
                               gracegreenman@gmail.com</a>
                       </h5>
                       <h5>
                           <a href="tel:123-456-7890-1"><i class="fas fa-phone"></i>
                               123-456-7890-1</a>
                       </h5>
                       <h5 class="mt-4">
                           <a href="#"><i class="fa-brands fa-facebook"></i></a>
                           <a href="#"><i class="fa-brands fa-facebook-messenger"></i></a>
                           <a href="#"> <i class="fa-brands fa-tiktok"></i></a>
                       </h5>
                   </div>
               </div>
           </div>
           <div class="row mt-4">
               <div class="col-md-12">
                   <div class="copyright">
                       <p>2023 | grace © All rights reserved</p>
                   </div>
               </div>
           </div>
       </div>
       <!-- <div class="sec4"></div> -->
   </footer>



<script src="{{URL::asset('questionnaire/assets/js/jquery.js')}}"></script>
<script src="{{URL::asset('questionnaire/assets/js/custom_questionaire.js')}}"></script>
<script src="{{URL::asset('admin-panel/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>

<script src="{{URL::asset('admin-panel/assets/js/toastr.min.js')}}"></script>
<script src="{{URL::asset('admin-panel/assets/js/custom.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
	new WOW().init();
</script>
