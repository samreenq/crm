<style>
    .pricing-content{position:relative;}
.pricing_design{
    position: relative;
    margin: 0px 15px;
}
.pricing_design .single-pricing{
    background:#3192eb;
    padding: 60px 40px;
    border-radius:30px;
    box-shadow: 0 10px 40px -10px rgba(0,64,128,.2);
    position: relative;
    z-index: 1;
}
.pricing_design .single-pricing:before{
    content: "";
    background-color: #fff;
    width: 100%;
    height: 100%;
    border-radius: 18px 18px 190px 18px;
    border: 1px solid #eee;
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: -1;
}
.price-head{}
.price-head h2 {
	margin-bottom: 20px;
	font-size: 26px;
	font-weight: 600;
}
.price-head h1 {
	font-weight: 600;
	margin-top: 30px;
	margin-bottom: 5px;
}
.price-head span{}

.single-pricing ul{list-style:none;margin-top: 30px;}
.single-pricing ul li {
	line-height: 36px;
}
.single-pricing ul li i {
	background: #3192eb;
	color: #fff;
	width: 20px;
	height: 20px;
	border-radius: 30px;
	font-size: 11px;
	text-align: center;
	line-height: 20px;
	margin-right: 6px;
}
.pricing-price{}

.price_btn {
	background: #3192eb;
	padding: 10px 30px;
	color: #fff;
	display: inline-block;
	margin-top: 20px;
	border-radius: 2px;
	-webkit-transition: 0.3s;
	transition: 0.3s;
}
.price_btn:hover{background:#0aa1d6;}
a{
text-decoration:none;    
}

.section-title {
    margin-bottom: 60px;
}
.text-center {
    text-align: center!important;
}

.section-title h2 {
    font-size: 45px;
    font-weight: 600;
    margin-top: 0;
    position: relative;
    text-transform: capitalize;
}
.modal-dialog.modal-dialog-centered {
    visibility: hidden;
}
button.close {
    FONT-SIZE: 15PX;
    CURSOR: POINTER;
    BACKGROUND: #3192eb;
    PADDING: 4PX 8PX;
    COLOR: #FFF;
    FONT-WEIGHT: 100;
    BORDER-RADIUS: 32PX;
    BORDER: 1PX SOLID #000;
    OPACITY: 1;
}
.pricing_design .single-pricing {
    padding: 14px 16px;
}
</style>

<section id="pricing" class="pricing-content section-padding">
  
	<div class="container">					
		{{-- <div class="section-title text-center">
			<h2>Pricing Plans</h2>
			<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
		</div>				 --}}
		<div class="row text-center">									
			<div class="col-lg-12 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
				<div class="pricing_design">
                    
					<div class="single-pricing">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<div class="price-head">		
                            
							<h1>$25</h1>
							<span>/Monthly</span>
						</div>
						<ul>
							<li><b>Questionnaire</b></li>
							
							<li><b>Unlimited</b> Support</li>
                            <li><b>Unlimited</b> Support</li>
                            <li><b>Unlimited</b> Support</li>
                            <li><b>Unlimited</b> Support</li>
                            <li><b>Unlimited</b> Support</li>
                            
						</ul>
						<div class="pricing-price">
							
						</div>
						<a href="#" class="price_btn" id="purchase_plan" data-id="{{  }}">Buy Now</a>
					</div>
				</div>
			</div><!--- END COL -->	
				  
		</div><!--- END ROW -->
	</div><!--- END CONTAINER -->
</section>