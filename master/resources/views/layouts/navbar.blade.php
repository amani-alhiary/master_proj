<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/shop-grid-4.html   11 Nov 2019 12:39:07 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Books &ndash; shop</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.png" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="assets/css/plugins.css">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="template-collection belle">
<div class="pageWrapper">
	<!--Search Form Drawer-->
	<div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="{{ route('search.index') }}" method="GET">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="search" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off" required>
            </form>
            <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                 
                    <p class="phone-no"><i class="anm anm-phone-s"></i> +962 (235) 9691 </p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                	<div class="text-center"><p class="top-header_middle-text"> Worldwide Express Shipping</p></div>
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
                      @if (Auth::check())
                      <li><a href="{{ url('profile12?id=' .Auth::user()->id )}}">{{ Auth::user()->name }}</a></li>
                      <li><a href="{{ url('wishlist?id=' . Auth::user()->id) }}">Wishlist</a></li>
                      @if (\Auth::user()->is_admin == true)
                      <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                      @endif
                      <li><form method="POST" action="{{ route('logout') }}">
                        @csrf
                       <li><a href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();" >log Out</a></li>
                      </form></li>
                      @else
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Create Account</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap animated d-flex">
    	<div class="container-fluid">        
            <div class="row align-items-center">
            	<!--Desktop Logo-->
                <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                    <a href="index.html">
                    	<img src="images/logo.jpg" alt="BOOK STORE" title="BOOK STORE" />
                    </a>
                </div>
                <!--End Desktop Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                	<div class="d-block d-lg-none">
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        	<i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                    </div>
                	<!--Desktop Menu-->
                	<nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent megamenu"><a href="/">Home <i class="anm anm-angle-down-l"></i></a>
                        
                            </li>
                            <li class="lvl1 parent megamenu"><a href="/booksuser">Shop <i class="anm anm-angle-down-l"></i></a>
                            
                            </li>
                            <li class="lvl1 parent megamenu"><a href="{{ route('usedbooks.index') }}">Used Books Shop <i class="anm anm-angle-down-l"></i></a>
                            
                            </li>
                           
                        <li class="lvl1 parent dropdown"><a href="/about">About us <i class="anm anm-angle-down-l"></i></a>
                       
                         
                        <li><a href="/contact" class="site-nav">Contact 
                        </li>
                      </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="index.html">
                            <img src="images/logo.jpg" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                        </a>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                	<div class="site-cart">
                    <a href="/cart">
                    	<a href="/cart"  style="font-size:22px;text-decoration:none">
                        	<i class="icon anm anm-bag-l" style="width:15px;height:15px;text-decoration:none">
                          <p style="color:white;margin-top:-20px">
                            <span class="visually-hidden">
                          {{ $items=0 }}
                            </span>
                          @if(session()->has('cart.books'))
                          @foreach (session('cart.books') as  $key => $value)
                          <span class="visually-hidden"> 
                          {{ $items=$items+$value}}
                        </span>

                          @endforeach
                          @endif
                          @if(session()->has('cart.usedbooks'))
                          @foreach (session('cart.usedbooks') as  $key => $value) 
                          <span class="visually-hidden">

                          {{ $items=$items+$value}}
                        </span>

                          @endforeach
                          @endif
                        </p>
                      </i>
                            <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count" style="margin-left: -50px">{{ $items }}</span>
                        </a>
                      </a>
                        <!--Minicart Popup-->
                        
                        <!--End Minicart Popup-->
                    </div>
                    <div class="site-header__search">
                    	<button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                    </div>
                </div>
        	</div>
        </div>
    </div>
    <!--End Header-->
    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
		<div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
        	<li class="lvl1 parent megamenu"><a href="/">Home </a>
            
           
           
          
        	<li class="lvl1 parent megamenu"><a href="/booksuser">Shop <i class="anm anm-plus-l"></i></a>
        
        </li>
        	<li class="lvl1 parent megamenu"><a href="{{ route('usedbooks.index') }}">Used Books Shop <i class="anm anm-plus-l"></i></a>
        </li>
          <ul>
          	<li><a href="/about" class="site-nav">About us <i class="anm anm-plus-l"></i></a>
            
            </li>
            <li><a href="/contact" class="site-nav">Contact s <i class="anm anm-plus-l"></i></a>
              
            </li>
             
            </li>
          </ul>
        </li>
          
        </li>
      </ul>
	</div>
  <div id="header-cart" class="block block-cart">
    <ul class="mini-products-list">
          <li class="item">
            <a class="product-image" href="#">
                <img src="assets/images/product-images/cape-dress-1.jpg" alt="3/4 Sleeve Kimono Dress" title="" />
              </a>
              <div class="product-details">
                <a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                  <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                  <a class="pName" href="cart.html">Sleeve Kimono Dress</a>
                  <div class="variant-cart">Black / XL</div>
                  <div class="wrapQtyBtn">
                      <div class="qtyField">
                        <span class="label">Qty:</span>
                          <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                          <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                          <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                      </div>
                  </div>
                  <div class="priceRow">
                    <div class="product-price">
                        <span class="money">$59.00</span>
                      </div>
                   </div>
</div>
          </li>
          <li class="item">
            <a class="product-image" href="#">
                <img src="assets/images/product-images/cape-dress-2.jpg" alt="Elastic Waist Dress - Black / Small" title="" />
              </a>
              <div class="product-details">
                <a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                  <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                  <a class="pName" href="cart.html">Elastic Waist Dress</a>
                  <div class="variant-cart">Gray / XXL</div>
                  <div class="wrapQtyBtn">
                      <div class="qtyField">
                        <span class="label">Qty:</span>
                          <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                          <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                          <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                      </div>
                  </div>
                   <div class="priceRow">
                      <div class="product-price">
                          <span class="money">$99.00</span>
                      </div>
                  </div>
              </div>
          </li>
      </ul>
      <div class="total">
        <div class="total-in">
            <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">$748.00</span></span>
          </div>
           <div class="buttonSet text-center">
              <a href="cart.html" class="btn btn-secondary btn--small">View Cart</a>
              <a href="checkout.html" class="btn btn-secondary btn--small">Checkout</a>
          </div>
      </div>
  </div>
  <!--End Minicart Popup-->
</div>

</div>
	<!--End Mobile Menu-->
    


  <script>
		jQuery(document).ready(function(){  
		  jQuery('.closepopup').on('click', function () {
			  jQuery('#popup-container').fadeOut();
			  jQuery('#modalOverly').fadeOut();
		  });
		  
		  var visits = jQuery.cookie('visits') || 0;
		  visits++;
		  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
		  console.debug(jQuery.cookie('visits')); 
		  if ( jQuery.cookie('visits') > 1 ) {
			jQuery('#modalOverly').hide();
			jQuery('#popup-container').hide();
		  } else {
			  var pageHeight = jQuery(document).height();
			  jQuery('<div id="modalOverly"></div>').insertBefore('body');
			  jQuery('#modalOverly').css("height", pageHeight);
			  jQuery('#popup-container').show();
		  }
		  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
		}); 
		
		jQuery(document).mouseup(function(e){
		  var container = jQuery('#popup-container');
		  if( !container.is(e.target)&& container.has(e.target).length === 0)
		  {
			container.fadeOut();
			jQuery('#modalOverly').fadeIn(200);
			jQuery('#modalOverly').hide();
		  }
		});
		
		/*--------------------------------------
			Promotion / Notification Cookie Bar 
		  -------------------------------------- */
		  if(Cookies.get('promotion') != 'true') {   
			 $(".notification-bar").show();         
		  }
		  $(".close-announcement").on('click',function() {
			$(".notification-bar").slideUp();  
			Cookies.set('promotion', 'true', { expires: 1});  
			return false;
		  });
	</script>