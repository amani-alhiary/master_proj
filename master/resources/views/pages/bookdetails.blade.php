@extends('layouts/master')
@section('content')


<script>
    // let $sale= $book[0]->sale_price - book[0]->sale_price
    // console.log($sale)
</script>


@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<div id="ProductSection-product-template" class="product-template__container prstyle1 container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <!--product-single-->
    <div class="product-single">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-details-img">
                    <div class="product-thumb">
                        <div id="gallery" class="product-dec-slider-2 product-tab-left">
                            <a data-image="usersimg/image/{{ $book[0]->image }}" data-zoom-image="usersimg/image/{{ $book[0]->image }}" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                <img class="blur-up lazyload" data-src="usersimg/image/{{ $book[0]->image }}" src="usersimg/image/{{ $book[0]->image }}" alt="" style="width:300vw;"/>
                            </a>
                            <a data-image="usersimg/image_01/{{ $book[0]->image_01 }}" data-zoom-image="usersimg/image_01/{{ $book[0]->image_01 }}" class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1">
                                <img class="blur-up lazyload" data-src="usersimg/image_01/{{ $book[0]->image_01 }}" src="usersimg/image_01/{{ $book[0]->image_01 }}" alt="" />
                            </a>
                            <a data-image="usersimg/image_02/{{ $book[0]->image_02 }}" data-zoom-image="usersimg/image_02/{{ $book[0]->image_02 }}" class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1">
                                <img class="blur-up lazyload" data-src="usersimg/image_02/{{ $book[0]->image_02 }}" src="usersimg/image_02/{{ $book[0]->image_02 }}" alt="" />
                            </a>
                            <a data-image="usersimg/image_03/{{ $book[0]->image_03 }}" data-zoom-image="usersimg/image_03/{{ $book[0]->image_03 }}" class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1">
                                <img class="blur-up lazyload" data-src="usersimg/image_03/{{ $book[0]->image_03 }}" src="usersimg/image_03/{{ $book[0]->image_03 }}" alt="" />
                            </a>
                            <a data-image="usersimg/image/{{ $book[0]->image_04 }}" data-zoom-image="usersimg/image/{{ $book[0]->image_04 }}" class="slick-slide slick-cloned" data-slick-index="0" aria-hidden="true" tabindex="-1">
                                <img class="blur-up lazyload" data-src="usersimg/image/{{ $book[0]->image_04 }}" src="usersimg/image/{{ $book[0]->image_04 }}" alt="" />
                            </a>
                           
                           
                        </div>
                    </div>
                    <div class="zoompro-wrap product-zoom-right pl-20">
                        <div class="zoompro-span">
                            <img class="blur-up lazyload zoompro" data-zoom-image="usersimg/image/{{ $book[0]->image }}" alt="" src="usersimg/image/{{ $book[0]->image }}" style="width:100%;"/>
                        </div>
                        <div class="product-labels">
                            @if ($book[0]->price-$book[0]->sale_price!='0')
                            <span class="lbl on-sale">Sale</span>
                            @endif
                            <span class="lbl pr-label1">new</span></div>
                        <div class="product-buttons">
                           
                        </div>
                    </div>
                    <div class="lightboximages">
                        <a href="assets/images/product-detail-page/camelia-reversible-big1.jpg" data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big2.jpg" data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big3.jpg" data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible7-big.jpg" data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big4.jpg" data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big5.jpg" data-size="1462x2048"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big6.jpg" data-size="731x1024"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big7.jpg" data-size="731x1024"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big8.jpg" data-size="731x1024"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big9.jpg" data-size="731x1024"></a>
                        <a href="assets/images/product-detail-page/camelia-reversible-big10.jpg" data-size="731x1024"></a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product-single__meta">
                        <h1 class="product-single__title">{{ $book[0]->book_name }}</h1>
                        <div class="product-nav clearfix">					
                            {{-- <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a> --}}
                        </div>
                        <div class="prInfoRow">
                            <form action="{{ route('authorbooksfilter.index') }}" method="GET">
                                @csrf
                                <input type="hidden" name="author" value="{{ $book[0]->author }}">
                                <button type="submit" style="border:none;cursor:pointer;padding-left:0">
                                <div class="product-stock"> <span class="instock ">{{ $book[0]->author }}</span>
                                    <span class="outstock hide">Unavailable</span> </div>
                            </button>
                            </form>
                          
                                 
                           
                         
                        </div>
                        @if ($book[0]->sale_price!=$book[0]->price)
                        <p class="product-single__price product-single__price-product-template">
                            <span class="visually-hidden">Regular price</span>
                            <s id="ComparePrice-product-template"><span class="money">JOD {{ $book[0]->sale_price }}.00</span></s>
                            <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                <span id="ProductPrice-product-template"><span class="money">JOD {{ $book[0]->price }}.00</span></span>
                            </span>
                            <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                <span>You Save</span>
                                <span id="SaveAmount-product-template" class="product-single__save-amount">
                                <span class="money">JOD </span>
                                </span>
                                <span class="off">(<span>{{number_format((($book[0]->sale_price-$book[0]->price)/$book[0]->price)*100) }}</span>%)</span>
                            </span>  
                        </p>
                        @else
                        <p class="product-single__price product-single__price-product-template">
                            {{-- <span class="visually-hidden">Regular price</span> --}}
                            
                            <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                <span id="ProductPrice-product-template"><span class="money">JOD {{ $book[0]->price }}.00</span></span>
                            </span>
                            
                        </p>
                        @endif
                     
                        </div>
                    <div class="product-single__description rte">
                        "{{ $book[0]->quote }}"
                    </div>
                    <div class="product-single__description rte">
                        "{{ $book[0]->description }}"
                    </div>
                 
                    <form action="{{ route('authorbooksfilter.index') }}" method="GET">
                        @csrf
                        <input type="hidden" name="author" value="{{ $book[0]->author }}">
                        <p class="infolinks" style="margin-bottom: 3vh">

                        <button type="submit" style="border:none;cursor:pointer;padding-left:0">
                  
                            <a class="sizelink btn"> {{ $book[0]->author }}</a> 

                        </button>
                    </p>

                    </form>
                   

                        <!-- Product Action -->
                       
                                    <form method="POST" action="{{ route('addtocart') }}">
                                        @csrf
                                        <div class="product-action clearfix">
                                            <div class="product-form__item--quantity">
                                                <div class="wrapQtyBtn">
                                                    <div class="qtyField">
                                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                        <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>                                
                                            <div class="product-form__item--submit">
                                        <input type="hidden" value=" {{ $book[0]->id }}" name="book_id"/>
                                        {{-- @if (Auth::check())
                                        <input type="hidden" value=" {{ Auth::user()->id }}" name="user_id"/>
                                        @endif --}}
                                        <button type="submit" class="btn product-form__cart-submit">
                                    Add to cart
                                        </button>
                                    </form>
                            </div>
                            <div class="shopify-payment-button" data-shopify="payment-button">
                             
                            </div>
                        </div>
                        <!-- End Product Action -->
                
                    <div class="display-table shareRow">
                            <div class="display-table-cell medium-up--one-third">
                                <div class="wishlist-btn">
                                    @if (Auth::check())
                                    
                                    @if ($favourites->isNotEmpty()) 
                                        <button class="wishlist add-to-wishlist" type="submit" style="cursor: pointer" >
                                            <i class="fa fa-heart" style="cursor: pointer;color:red"></i>
                                            Add to wishlist
                                            </button>
                                    
                                     @else
                                    <form action="{{ route('addtofavourite.store') }}"  method="post" class="price-filter" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book[0]->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <button class="wishlist add-to-wishlist" type="submit" style="cursor: pointer" >
                                        <i class="icon anm anm-heart-l" style="cursor: pointer"></i>
                                        Add to wishlist
                                        </button>
                                    </form>
                                    @endif
                                    @endif

                                </div>
                            </div>
                            <div class="display-table-cell text-right">
                                <div class="social-sharing">
                                    
                                  
                            
                                 </div>
                            </div>
                        </div>
                        

                    <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck" aria-hidden="true"></i> YOU ARE IN JORDAN! <b class="freeShip"><span class="money" data-currency-usd="$199.00" data-currency="USD">CONGRATULATIONS</span></b> YOU GOT <b>FREE SHIPPING!</b></p>
                    <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED DELIVERY BETWEEN <b id="fromDate">2 days</b> to <b id="toDate">10 days</b>.</p>
                    <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users" aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE LOOKING FOR THIS PRODUCT</div>
                </div>
        </div>
    </div>
    <!--End-product-single-->
    <!--Product Fearure-->
    <div class="prFeatures">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                <img src="assets/images/credit-card.png" alt="Safe Payment" title="Safe Payment" />
                <div class="details"><h3>Safe Payment</h3>Pay with the world's most payment methods.</div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                <img src="assets/images/shield.png" alt="Confidence" title="Confidence" />
                <div class="details"><h3>Confidence</h3>Protection covers your purchase and personal data.</div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                <img src="assets/images/worldwide.png" alt="Worldwide Delivery" title="Worldwide Delivery" />
                <div class="details"><h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp; regions.</div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                <img src="assets/images/phone-call.png" alt="Hotline" title="Hotline" />
                <div class="details"><h3>Hotline</h3>Talk to help line for your question on 4141 456 789, 4125 666 888</div>
            </div>
        </div>
    </div>
    <!--End Product Fearure-->
    <!--Product Tabs-->
    <div class="tabs-listing">
        <ul class="product-tabs">
            <li rel="tab1"><a class="tablink">Product Details</a></li>
            @if (Auth::check())
            <li rel="tab2"><a class="tablink">Product Reviews</a></li>
            @endif
        </ul>
        <div class="tab-container">
            <div id="tab1" class="tab-content">
                <div class="product-description rte">
              
                    <h3>"{{ $book[0]->quote }}"</h3>
                    <p>{{ $book[0]->description }}&nbsp;</p>
   
                </div>
            </div>
            
            <div id="tab2" class="tab-content">
                <div id="shopify-product-reviews">
                    <div class="spr-container">
                        <div class="spr-header clearfix">
                            <div class="spr-summary">
                                {{-- <span class="product-review"><a class="reviewLink"> </a><span class="spr-summary-actions-togglereviews">Based on 6 reviews456</span></span> --}}
                                <span class="spr-summary-actions">
                                    <a href="#" class="spr-summary-actions-newreview btn">Write a review</a>
                                </span>
                            </div>
                        </div>
                        <div class="spr-content">
                            <div class="spr-form clearfix">
                                <form method="post" action="{{ route('addcomment.store') }}" id="new-review-form" class="new-review-form" enctype="multipart/form-data">
                                    @csrf
                                    <h3 class="spr-form-title">Write a review</h3>
                                    @if (Auth::check())
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" placeholder="Give your review a title">
                                    @endif

                                    <input type="hidden" name="book_id" value="{{ $book[0]->id }}" placeholder="Give your review a title">
                                    {{-- <fieldset class="spr-form-contact">
                                        <div class="spr-form-contact-name">
                                          <label class="spr-form-label" for="review_author_10508262282">Name</label>
                                          <input class="spr-form-input spr-form-input-text " id="review_author_10508262282" type="text" name="review[author]" value="" placeholder="Enter your name">
                                        </div>
                                        <div class="spr-form-contact-email">
                                          <label class="spr-form-label" for="review_email_10508262282">Email</label>
                                          <input class="spr-form-input spr-form-input-email " id="review_email_10508262282" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                        </div>
                                    </fieldset> --}}
                                    <fieldset class="spr-form-review">
                                      <div class="spr-form-review-title">
                                        <label class="spr-form-label" for="review_title_10508262282">Review Title</label>
                                        <input class="spr-form-input spr-form-input-text " id="review_title_10508262282" type="text" name="title" value="" placeholder="Give your review a title">
                                      </div>
                                
                                      <div class="spr-form-review-body">
                                        <label class="spr-form-label" for="review_body_10508262282">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                        <div class="spr-form-input">
                                          <textarea class="spr-form-input spr-form-input-textarea " id="review_body_10508262282" data-product-id="10508262282" name="comment" rows="10" placeholder="Write your comments here"></textarea>
                                        </div>
                                      </div>
                                    </fieldset>
                                    <fieldset class="spr-form-actions">
                                        <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                    </fieldset>
                                </form>
                            </div>
                            <div class="spr-reviews">
                                @if($comments=='null')
                                  there is no comment yet
                                @else
                                @foreach($comments as $comment)
                                <div class="spr-review" >
                                    <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview" src="usersimg/image/{{ $comment->image }}" style="width: 60px;height:60px;float: left;"/>

                                    <div class="spr-review-header" style="padding-top: -50px">
                                     
                                        <h3 class="spr-review-header-title">{{ $comment->title }}</h3>
                                        <span class="spr-review-header-byline"><strong>{{ $comment->name }}</strong> on <strong>{{ $comment->created_at }}</strong></span>
                                        
                                    </div>
                                    <div class="spr-review-content">
                                        <p class="spr-review-content-body">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                               
                                </div>
                            </div>
                        </div>
                        </div>
            
           
    <!--End Product Tabs-->
    
    <!--Related Product Slider-->
    <div class="related-product grid-products" style="margin-top: 150px">
        <header class="section-header">
            <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
            <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p>
        </header>
        <div class="productPageSlider">
            @foreach($realtedbooks as $realtedbook)
            <div class="col-12 item" >
                <!-- start product image -->
                <div class="product-image">
                    <!-- start product image -->
                    <a  href="{{ url('booksdetails?id=' . $realtedbook['id']) }}" >
                        <!-- image -->
                        <img class="primary blur-up lazyload" data-src="usersimg/image/{{ $realtedbook->image }}" src="usersimg/image/{{ $realtedbook->image }}" alt="image" title="product" style="height: 350px">
                        <!-- End image -->
                        <!-- Hover image -->
                        <img class="hover blur-up lazyload" data-src="usersimg/image/{{ $realtedbook->image_01 }}" src="usersimg/image_01/{{ $realtedbook->image_01 }}" alt="image" title="product" style="height: 350px">
                        <!-- End hover image -->
                        <!-- product label -->
                        <div class="product-labels rectangular">
                            @if ($realtedbook->sale_price!=$realtedbook->price)
                            <span class="lbl on-sale">-{{number_format((($realtedbook->sale_price-$realtedbook->price)/$realtedbook->price)*100) }}%</span> 
                            @endif
                            <span class="lbl pr-label1">new</span></div>
                        <!-- End product label -->
                    </a>
                    <!-- end product image -->

                    <!-- Start product button -->
                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                        <a  href="{{ url('booksdetails?id=' . $realtedbook['id']) }}">

                        <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                        </a>
                    </form>
                    <div class="button-set">
                        <a  href="{{ url('booksdetails?id=' . $realtedbook['id']) }}" class="wishlist add-to-wishlist">
                                                        <i class="icon anm anm-search-plus-r"></i>
                        </a>
                       
                    </div>
                    <!-- end product button -->
                </div>
                <!-- end product image -->
                <!--start product details -->
                <div class="product-details text-center">
                    <!-- product name -->
                    <div class="product-name">
                        <a href="#">{{ $realtedbook->book_name }}</a>
                    </div>
                    <!-- End product name -->
                    <!-- product price -->
                    @if ($realtedbook->sale_price!=$realtedbook->price)

                    <div class="product-price">
                        <span class="old-price">JOD {{ $realtedbook->price }}.00</span>
                        <span class="price">JOD {{ $realtedbook->sale_price }}.00</span>
                    </div>
                    @else
                    <div class="product-price">
                        
                        <span class="price">JOD {{ $realtedbook->sale_price }}.00</span>
                    </div>
                     @endif
                    <!-- End product price -->
             
             
                </div>
                <!-- End product details -->
            </div>
            @endforeach
    
        </div>
        </div>
    <!--End Related Product Slider-->
    
    <!--Recently Product Slider-->
   
    <!--End Recently Product Slider-->
    </div>
<!--#ProductSection-product-template-->
</div>
<!--MainContent-->
</div>
<!--End Body Content-->

<hr>
<div class="footer-bottom">
    <div class="row">
        <!--Footer Copyright-->
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left"><span></span> <a href="templateshub.net">Templates Hub</a></div>
        <!--End Footer Copyright-->
        <!--Footer Payment Icon-->
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-0 order-md-1 order-lg-1 order-sm-0 payment-icons text-right text-md-center">
            <ul class="payment-icons list--inline">
                <li><i class="icon fa fa-cc-visa" aria-hidden="true"></i></li>
                <li><i class="icon fa fa-cc-mastercard" aria-hidden="true"></i></li>
                <li><i class="icon fa fa-cc-discover" aria-hidden="true"></i></li>
                <li><i class="icon fa fa-cc-paypal" aria-hidden="true"></i></li>
                <li><i class="icon fa fa-cc-amex" aria-hidden="true"></i></li>
                <li><i class="icon fa fa-credit-card" aria-hidden="true"></i></li>
            </ul>
        </div>
        <!--End Footer Payment Icon-->
    </div>
</div>
</div>
</div>
</footer>
<!--End Footer-->
<!--Scoll Top-->
<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
<!--End Scoll Top-->

<div class="hide">
<div id="sizechart">
<h3>WOMEN'S BODY SIZING CHART</h3>
<table>
<tbody>
<tr>
<th>Size</th>
<th>XS</th>
<th>S</th>
<th>M</th>
<th>L</th>
<th>XL</th>
</tr>
<tr>
<td>Chest</td>
<td>31" - 33"</td>
<td>33" - 35"</td>
<td>35" - 37"</td>
<td>37" - 39"</td>
<td>39" - 42"</td>
</tr>
<tr>
<td>Waist</td>
<td>24" - 26"</td>
<td>26" - 28"</td>
<td>28" - 30"</td>
<td>30" - 32"</td>
<td>32" - 35"</td>
</tr>
<tr>
<td>Hip</td>
<td>34" - 36"</td>
<td>36" - 38"</td>
<td>38" - 40"</td>
<td>40" - 42"</td>
<td>42" - 44"</td>
</tr>
<tr>
<td>Regular inseam</td>
<td>30"</td>
<td>30½"</td>
<td>31"</td>
<td>31½"</td>
<td>32"</td>
</tr>
<tr>
<td>Long (Tall) Inseam</td>
<td>31½"</td>
<td>32"</td>
<td>32½"</td>
<td>33"</td>
<td>33½"</td>
</tr>
</tbody>
</table>
<h3>MEN'S BODY SIZING CHART</h3>
<table>
<tbody>
<tr>
<th>Size</th>
<th>XS</th>
<th>S</th>
<th>M</th>
<th>L</th>
<th>XL</th>
<th>XXL</th>
</tr>
<tr>
<td>Chest</td>
<td>33" - 36"</td>
<td>36" - 39"</td>
<td>39" - 41"</td>
<td>41" - 43"</td>
<td>43" - 46"</td>
<td>46" - 49"</td>
</tr>
<tr>
<td>Waist</td>
<td>27" - 30"</td>
<td>30" - 33"</td>
<td>33" - 35"</td>
<td>36" - 38"</td>
<td>38" - 42"</td>
<td>42" - 45"</td>
</tr>
<tr>
<td>Hip</td>
<td>33" - 36"</td>
<td>36" - 39"</td>
<td>39" - 41"</td>
<td>41" - 43"</td>
<td>43" - 46"</td>
<td>46" - 49"</td>
</tr>
</tbody>
</table>
<div style="padding-left: 30px;"><img src="assets/images/size.jpg" alt=""></div>
</div>
</div>
<div class="hide">
<div id="productInquiry">
<div class="contact-form form-vertical">
<div class="page-title">
<h3>Camelia Reversible Jacket</h3>
</div>
<form method="post" action="#" id="contact_form" class="contact-form">
<input type="hidden" name="form_type" value="contact" />
<input type="hidden" name="utf8" value="✓" />
<div class="formFeilds">
<input type="hidden"  name="contact[product name]" value="Camelia Reversible Jacket">
<input type="hidden"  name="contact[product link]" value="/products/camelia-reversible-jacket-black-red">
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <input type="text" id="ContactFormName" name="contact[name]" placeholder="Name"  value="" required>
  </div>
</div>
<div class="row">
<div class="col-12 col-sm-12 col-md-6 col-lg-6">
  <input type="email" id="ContactFormEmail" name="contact[email]" placeholder="Email"  autocapitalize="off" value="" required>
</div>
<div class="col-12 col-sm-12 col-md-6 col-lg-6">
    <input required type="tel" id="ContactFormPhone" name="contact[phone]" pattern="[0-9\-]*" placeholder="Phone Number"  value="">
</div>
</div>
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <textarea required rows="10" id="ContactFormMessage" name="contact[body]" placeholder="Message" ></textarea>
  </div>  
</div>
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
      <input type="submit" class="btn" value="Send Message">
</div>
</div>
</div>
</form>
</div>
</div>
</div>


<!-- Including Jquery -->
<script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="assets/js/vendor/jquery.cookie.js"></script>
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/wow.min.js"></script>
<!-- Including Javascript -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/lazysizes.js"></script>
<script src="assets/js/main.js"></script>
<!-- Photoswipe Gallery -->
<script src="assets/js/vendor/photoswipe.min.js"></script>
<script src="assets/js/vendor/photoswipe-ui-default.min.js"></script>
<script>
$(function(){
var $pswp = $('.pswp')[0],
image = [],
getItems = function() {
    var items = [];
    $('.lightboximages a').each(function() {
        var $href   = $(this).attr('href'),
            $size   = $(this).data('size').split('x'),
            item = {
                src : $href,
                w: $size[0],
                h: $size[1]
            }
            items.push(item);
    });
    return items;
}
var items = getItems();

$.each(items, function(index, value) {
image[index]     = new Image();
image[index].src = value['src'];
});
$('.prlightbox').on('click', function (event) {
event.preventDefault();

var $index = $(".active-thumb").parent().attr('data-slick-index');
$index++;
$index = $index-1;

var options = {
    index: $index,
    bgOpacity: 0.9,
    showHideOpacity: true
}
var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
lightBox.init();
});
});
</script>
</div>



@endsection