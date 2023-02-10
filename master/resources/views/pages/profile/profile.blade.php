@extends('layouts/master')
@section('content')


<link href="{{ asset('profilestyle.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="{{ asset('admindashboard/build/css/deletemodal.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">


<header>
	<div class="container">

		<div class="profile">

			<div class="profile-image">

				<img src="usersimg/image/{{ Auth::user()->image }}" alt="" style="height: 250px">

			</div>

			<div class="profile-user-settings">

				<h1 class="profile-user-name">{{ Auth::user()->name }}</h1>
        
    

                       

			

			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count">{{$total_books}}</span> books</li>
					<li><span class="profile-stat-count">{{$total_sold_books}}</span> Sold Books</li>
					<li><span class="profile-stat-count">{{$total_unsold_books}}</span> UnSold Books</li>
				</ul>

			</div>

			<div class="profile-bio" >

        <a href="{{ route('userbooks.index') }}" class="btn profile-edit-btn" style="margin-left:0">Add New Book</a> 
				<a href="{{ url('editprofile?id=' . Auth::user()->id) }}"> <button class="btn profile-edit-btn">Edit Profile</button></a>
				<a href="{{ url('orderprofile?id=' . Auth::user()->id) }}"> <button class="btn profile-edit-btn">Your Orders</button></a>


			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>

<main>

	<div class="container">

		<div class="gallery">
   
			@foreach($books as $book)
		
			<div class="gallery-item" tabindex="0" >
				{{-- <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview" style="color: white"> --}}
          
        @if($book->is_sold=='1')
        <a  href="{{ url('userbooksdetails?id=' . $book['id']) }}">
          				<img src="usersimg/image/{{ $book->image }}" class="gallery-image" alt="" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);text-align:center">
    
      <div class="gallery-item-info">

        <ul>
          <li class="gallery-item-likes" style="margin-left: 10%;color:white"> SOLD OUT</li>
          <br>
        </ul>

      </div>
    </a>
        @else
        <a  href="{{ url('userbooksdetails?id=' . $book['id']) }}">
                  <img src="usersimg/image/{{ $book->image }}" class="gallery-image" alt="" style="color: white" >
      
      <div class="gallery-item-info">

        <ul>
          <li class="gallery-item-likes" style="margin-left: 10%;color:white"> {{ $book->book_name }}</li>
          <br>
          <li class="gallery-item-comments" style="margin-left: 10%;color:white ">JOD {{ $book->price }}.00</li>
            <br>
          <div>
          {{-- <a href="{{ url('editprofilebook?id=' . $book->id) }}"> <button class="btn profile-edit-btn" style="color: white;margin-bottom:20px;margin-top:20px">Edit Book</button></a> --}}
          <form action="{{ route('editprofilebook',$book->id) }}" method="Post">
            @csrf
            <input type="hidden" name="id" value="{{$book->id}}"> 
               
            <button class="btn profile-edit-btn" style="color: white;margin-bottom:20px;margin-top:20px" type="submit">Edit Book</button></a>
          </form>


          <form action="{{ route('booksuser.destroy',$book->id) }}" method="Post">

        @csrf
        @method('DELETE')
        <td class=" last"><a href="#myModal" class="trigger-btn" data-toggle="modal"><button type="submit" class="btn profile-edit-btn"   style="color: white"> <i class="fa fa-trash-o"></i>Delete</button></a>
        </td>
      </form>
          </div>
        </ul>

      </div>
    </a>
        @endif
         
	

			</div>
      <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
          <div class="modal-content">
            <div class="modal-header flex-column">
              <div class="icon-box">
                <i class="material-icons">&#xE5CD;</i>
              </div>						
              <h4 class="modal-title w-100">Are you sure?</h4>	
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <form action="{{ route('booksuser.destroy',$book->id) }}" method="Post">
                @csrf
                @method('DELETE')
  
              <button type="submit" class="btn btn-danger" >Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>    
			@endforeach
			



			

		</div>
		<!-- End of gallery -->

		<div class="loader"></div>

	</div>
	<!-- End of container -->

    <!--Quick View popup-->
    <div class="modal fade quick-view-popup" id="content_quickview">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-body">
                    <div id="ProductSection-product-template" class="product-template__container prstyle1">
                <div class="product-single">
                <!-- Start model close -->
                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a>
                <!-- End model close -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="pl-20">
                                <img src="assets/images/product-detail-page/camelia-reversible-big1.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-single__meta">
                                <h2 class="product-single__title">Product Quick View Popup</h2>
                                <div class="prInfoRow">
                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                    <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">$500.00</span></span>
                                    </span>
                                </p>
                                <div class="product-single__description rte">
                                    Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,...
                                </div>
                                
                            <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                                <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                    <div class="product-form__item">
                                      <label class="header">Color: <span class="slVariant">Red</span></label>
                                      <div data-value="Red" class="swatch-element color red available">
                                        <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url(assets/images/product-detail-page/variant1-1.jpg);" title="Red"></label>
                                      </div>
                                      <div data-value="Blue" class="swatch-element color blue available">
                                        <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-blue" style="background-image:url(assets/images/product-detail-page/variant1-2.jpg);" title="Blue"></label>
                                      </div>
                                      <div data-value="Green" class="swatch-element color green available">
                                        <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-green" style="background-image:url(assets/images/product-detail-page/variant1-3.jpg);" title="Green"></label>
                                      </div>
                                      <div data-value="Gray" class="swatch-element color gray available">
                                        <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-gray" style="background-image:url(assets/images/product-detail-page/variant1-4.jpg);" title="Gray"></label>
                                      </div>
                                    </div>
                                </div>
                                <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                    <div class="product-form__item">
                                      <label class="header">Size: <span class="slVariant">XS</span></label>
                                      <div data-value="XS" class="swatch-element xs available">
                                        <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-xs" title="XS">XS</label>
                                      </div>
                                      <div data-value="S" class="swatch-element s available">
                                        <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-s" title="S">S</label>
                                      </div>
                                      <div data-value="M" class="swatch-element m available">
                                        <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-m" title="M">M</label>
                                      </div>
                                      <div data-value="L" class="swatch-element l available">
                                        <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-l" title="L">L</label>
                                      </div>
                                    </div>
                                </div>
                                <!-- Product Action -->
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
                                        <button type="button" name="add" class="btn product-form__cart-submit">
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Product Action -->
                            </form>
                            <div class="display-table shareRow">
                                    <div class="display-table-cell">
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
                <!--End-product-single-->

</main>
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


  
</script>

@endsection