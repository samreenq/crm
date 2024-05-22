@extends('layout')








@section('body_container')
    <section class="sec1">
        <div class="container-fluid">
            <div class="row banner-sec-box">
                <div class="col-lg-7 col-md-4 "></div>
                <div class="col-lg-5 col-md-8  p-0">
                    <div class="green-box-cover wow slideInRight"
                        style="animation-delay: 0s; visibility: visible; animation-name: slideInRight;">
                        <div class="green-box">
                            <h6>Business Solutions</h6>
                            <hr class="banner-hr">
                            <p>Select from our diverse range of three crafted
                                packages tailored to precisely align with your
                                distinct business needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec2">
        <div class="container">
            <div class="row card-pkg-top">
                <div class="col-md-4 mb-2">
                    <a href="{{ route("plan.essence") }}">
                        <div class="card-pkg  wow bounceIn"
                            style="animation-delay: 0.3s; visibility: visible; animation-name: bounceIn;">
                            <div class="card">
                                <div class="card-body p-4 text-center">
                                    <img src="{{ URL::asset('custom/assets/images/pkg01.png') }}" alt="">
                                    <h6>
                                        Essence<br> Package
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-2">
                    <a href="{{ route("plan.growth") }}">
                        <div class="card-pkg card-pkg1 wow bounceIn"
                            style="animation-delay: 0.6s; visibility: visible; animation-name: bounceIn;">
                            <div class="card">
                                <div class="card-body p-4 text-center">
                                    <img src="{{ URL::asset('custom/assets/images/pkg02.png') }}" alt="">
                                    <h6>
                                        Growth<br> Package
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-2">
                    <a href="{{ route("plan.flourish") }}">
                        <div class="card-pkg wow bounceIn"
                            style="animation-delay: 0.9s; visibility: visible; animation-name: bounceIn;">
                            <div class="card">
                                <div class="card-body p-4 text-center">
                                    <img src="{{ URL::asset('custom/assets/images/pkg03.png') }}" alt="">
                                    <h6>
                                        Flourish<br> Package
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <section class="sec3">
            <div class="pl60">
                <div class="sec3-bottom">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-md-8">
                                <div class="card card-toper">
                                    <div class="card-body p-3 wow slideInLeft"
                                        style="animation-delay: 0s; visibility: visible;">
                                        <div class="e-card">
                                            <h5>{{ $planDetail[0]['plan_desc'] }}</h5>
                                            <h6>$1,890/year or $199/month</h6>
                                            <p>Everything from the client questionnaire plus:</p>
                                             <ul>
                                                   <li>Three audio-based client info courses</li>
                                                   <li>Seamless integration on your site</li>
                                                   <li>Replaces time-consuming article searches</li>
                                                   <li>Instant access for comprehensive understanding</li>
                                                   <li>Ensures end-to-end info coverage</li>
                                                   <li>Exhibits top-tier customer service and value</li>
                                                   <li>Demonstrates tailored care and appreciation</li>
                                             </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <div class="card rad20 pad20 wow slideInRight"
                                    style="animation-delay: 0.5s; visibility: visible; animation-name: slideInRight;"
                                    style="border-radius: 10px;">
                                    <div class="card-body">
                                        <a href="#" id="purchase_plan" data-id="{{ $planDetail[0]['plan_id'] }}">
                                            <div class="cart-img-box">
                                                <img src="{{ URL::asset('custom/assets/images/cart.png') }}" alt="">
                                                <h6>Buy Now</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sec3-para wow slideInDown" style="animation-delay: 1s; visibility: visible; animation-name: slideInDown;">
                                    <p>
                                    <span style="font-weight:500">Our three courses cover essential topics:</span>        
                                    <br>  <br> 
                                    <span style="color:#fff">- Landscape Design & Installation Process:</span> 
                                    avoids misunderstandings, educates on budget and labor costs and promotes transparency.
                                      <br> <br>     
                                     <span style="color:#fff">- Landscape Maintenance After Installation:</span> 
                                    imparts maintenance knowledge, sets realistic expectations and covers key topics.
                                         <br>  <br> 
                                     <span style="color:#fff">- Interlocking Concrete Paver Maintenance:</span> 
                                    extends paver life, addresses cleaning and enhancements and offers guidance.
                                        <br>   <br> 
                                    These courses complement the client questionnaire, aligning insights and streamlining 
                                    understanding. They benefit by boosting client knowledge, early trust establishment, and 
                                    enhanced productivity. Just like the client questionnaire these courses can easily be integrated 
                                    onto your company’s website and placed where you would like clients to have access to them.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </section>
@endsection
