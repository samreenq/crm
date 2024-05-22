

<style>
    .hide{display:none}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>


 <script type="text/javascript">
    
    </script>








         <div class=" col-md-12 ">
            <div class="card">
                <div class="card-body"> 
                    <div class="card-title text-center">
                        <p> <b>Subscription </b></p>
                    </div>
                    <div class="col-md-12 form-group stripe-success" style="display: none">
                        <div class="alert-success alert">Card Verfied</div>
                    </div>
                        <form 
                        role="form" 
                        action =""
                        method="post" 
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required' style="width: 100%;">
                                    <label class='control-label'>Name on Card</label> <input
                                        class='form-control' size='4' type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required' style="width: 100%;">
                                    <label class='control-label'>Card Number</label> <input
                                        autocomplete='off' class='form-control card-number' size='20'
                                        type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required' style="padding:5px">
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'></div>
                                </div>
                            </div>
                            <input type="hidden" name="userId" value="{{ $id }}" />
                        
                            <div class="row">
                                <div class="col-xs-12 text-center" style="width:100%">
                                    <button class="btn btn-primary btn-block" type="submit">Verify Card </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
         </div>





