@extends('layouts/master')
@section('content')

    <!--Body Content-->
    <div id="page-content">
    	<!--Collection Banner-->
    	<div class="collection-header">
			<div class="collection-hero">
        		<div class="collection-hero__image"><img class="blur-up lazyload" data-src="https://images.pexels.com/photos/2465877/pexels-photo-2465877.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" src="https://images.pexels.com/photos/2465877/pexels-photo-2465877.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="shop" title="shop" /></div>
        		<div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">BOOKS SHOP</h1></div>
      		</div>
		</div>
        <!--End Collection Banner-->
        
        <div class="container">
        	<div class="row">
            	<!--Sidebar-->
            	<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                	<div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                	<div class="sidebar_tags">
                    	<!--Categories-->
                    	<div class="sidebar_widget categories filter-widget">
                            <div class="widget-title"><h2>Categories</h2></div>
                            <div class="widget-content">
                                <ul class="sidebar_categories">
                                    {{-- @foreach ($categories as $category)
                                    <li class="level1 sub-level"><a href="#;" class="site-nav">{{ $category->category_name }}</a>
                                        @endforeach --}}

                                    
                                    </li>
                                    <li class="level1 sub-level"><a href="#;" class="site-nav">Fliter by Category</a>
                                    	<ul class="sublinks">
                                            @foreach ($categories as $category)
                                            <form action="{{ route('categorybooksfilter.index') }}" method="GET">
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                        	<li class="level2"><button type="submit" class="site-nav" style="cursor: pointer">{{ $category->category_name }}</button></li>
                                        </form>

                                            @endforeach
                                          
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                        <!--Categories-->
                        <!--Price Filter-->
                        <div class="sidebar_widget filterBox filter-widget">
                            <div class="widget-title">
                            	<h2>Price</h2>
                            </div>
                            <form action="{{ route('categorybooksfilter.store') }}"  method="post" class="price-filter" enctype="multipart/form-data">
                                @csrf
                                <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                	<div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="no-margin"><input id="amount" name="price" type="text"></p>
                                    </div>
                                    <input id="minprice" type="hidden" name="minprice" type="text" style="widt
                                    100px">
                                    <input id="maxprice" type="hidden" name="maxprice" type="text" style="widt
                                    100px">

                                    <div class="col-6 text-right margin-25px-top">
                                        <button type="submit" class="btn btn-secondary btn--small">filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Price Filter-->
                        <!--Size Swatches-->
                      
                        <!--End Size Swatches-->
                        <!--Color Swatches-->
                       
                        <!--End Color Swatches-->
                        <!--Brand-->
                       
                        <!--End Brand-->
                        <!--Popular Products-->
						 <div class="sidebar_widget">
                        	<div class="widget-title"><h2>Popular Products</h2></div>
							<div class="widget-content">
                                <div class="list list-sidebar-products">
                                  <div class="grid">
                                    @foreach ($rendombooks as $rendombook)
                                    <div class="grid__item">
                                      <div class="mini-list-item">
                                        <div class="mini-view_image">
                                            <a class="grid-view-item__link" href="{{ url('booksdetails?id=' . $rendombook['id']) }}">
                                                <img class="grid-view-item__image" src="usersimg/image/{{ $rendombook->image }}" alt="" style="height:100px" />
                                            </a>
                                        </div>
                                        <div class="details"> <a class="grid-view-item__title" href="{{ url('booksdetails?id=' . $rendombook['id']) }}">{{ $rendombook->book_name }}</a>
                                            <br>
                                            <form action="{{ route('authorbooksfilter.index') }}" method="GET">
                                                @csrf
                                                <input type="hidden" name="author" value="{{ $rendombook->author }}">
                                            <button type="submit">
                                            <a class="grid-view-item__title" >{{ $rendombook->author }}</a>
                                            </button>
                                            </form>
                                          <div class="grid-view-item__meta"><span class="product-price__price"><span class="money">JOD {{ $rendombook->price }}.00</span></span></div>
                                        </div>
                                      </div>
                                    </div>
                                    @endforeach
                                  
                                    </div>
                                  </div>
                                </div>
                          	</div>
						</div> 
                        <!--End Popular Products-->
                        <!--Banner-->
                        <div class="sidebar_widget static-banner">
                        	<img src="usersimg/image/istockphoto-1263779983-612x612.jpg" alt="" />
                        </div>
                        <!--Banner-->
                        <!--Information-->
                        <div class="sidebar_widget">
                            <div class="widget-title"><h2>Information</h2></div>
                            <div class="widget-content"><p>Mission</h2></div>
                                <div class="widget-content"><p>Our mission is simple: To help local, independent bookstores thrive in the age of ecommerce. Certified as a B Corp, Bookshop.org puts this mission and the public good above financial interests, giving over 80% of our profit margin to independent bookstores. In 2022, B-Labs announced we were "best for the world": in the top 5% of all B-Corps</p></div>
                        </div>
                        <!--end Information-->
                        <!--Product Tags-->
                        <div class="sidebar_widget">
                          <div class="widget-title">
                            <h2>Authors</h2>
                          </div>
                          <div class="widget-content">
                            <ul class="product-tags">
                                @foreach ($authors as $author)
                                <form action="{{ route('authorbooksfilter.index') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="author" value="{{ $author->author }}">
                              <li><button type="submit" style="cursor: pointer">{{ $author->author }}</button></li>
                                </form>
                              @endforeach
                             
                            </ul>
                            <span class="btn btn--small btnview">View all</span> </div>
                        </div>
                        <!--end Product Tags-->
                </div>
                <!--End Sidebar-->
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                	<div class="productList">
                    	<!--Toolbar-->
                        <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    	<div class="toolbar">
                        	<div class="filters-toolbar-wrapper">
                            	<div class="row">
                                	<div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                    
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    	<span class="filters-toolbar__product-count">New Books</span>
                                    </div>
                                    
                            </div>
                        </div>
                        <!--End Toolbar-->
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="grid-products grid--view-items">
                        <div class="row">
                            
                    @foreach ($books as $book)
                 
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">

                                    <!-- start product image -->
                                    <div class="product-image">
                                        <!-- start product image -->
                                        <a  href="{{ url('booksdetails?id=' . $book['id']) }}" >
                                            <!-- image -->
                                            <img class="primary blur-up lazyload" data-src="usersimg/image/{{ $book->image }}" src="usersimg/image/{{ $book->image }}" alt="image" title="product" style="height:350px">
                                            <!-- End image -->
                                            <img class="hover blur-up lazyload" data-src="usersimg/image/{{ $book->image_01 }}" src="usersimg/image/{{ $book->image_01 }}" alt="image" title="product" style="height:350px">
                                            <!-- End hover image -->
                                            <!-- product label -->
                                            @if ($book->price!=$book->sale_price)

                                            <div class="product-labels rectangular"><span class="lbl on-sale">-{{number_format((($book->sale_price-$book->price)/$book->price)*100) }}%</div>
                                            <!-- End product label -->
                                            @endif
                                        </a>
                                        <!-- end product image -->
                                        
                                        <!-- countdown start -->
                                        @if ($book->price!=$book->sale_price)

                                        <div class="saleTime desktop" data-countdown="2023/03/6"></div>
                                        @endif

                                        <!-- countdown end -->
    
                                        <!-- Start product button -->
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                            {{-- <a href="{{ route('booksdetails.show',$book->id) }}"> --}}
                                                <a  href="{{ url('booksdetails?id=' . $book['id']) }}">

                                            <button class="btn btn-addto-cart" type="button">See Details</button>
                                            </a>
                                        </form>
                                        <div class="button-set">
                                            <a  href="{{ url('booksdetails?id=' . $book['id']) }}" class="quick-view-popup quick-view">

                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" title="Add to Compare">
        
                                                    <form method="POST" action="{{ route('addtocart') }}">
                                                        @csrf
                                                                       
                                                                        <input type="hidden" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                                       
                                                        <input type="hidden" value=" {{ $book->id }}" name="book_id"/>
                                                        <button class="btn cartIcon btn-addto-cart" type="submit" tabindex="0">
                                                    <i class="icon anm anm-bag-l"></i>
                                                </button>
                                            </form>
                                        </a>
                                                    </div>  
                                        </div>
                                        <!-- end product button -->
                                    </div>
                                    <!-- end product image -->
    
                                    <!--start product details -->
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a  href="{{ url('booksdetails?id=' . $book['id']) }}" >
                                                {{ $book->book_name }}</a>
                                        </div>
                                        <div class="product-name">
                                            <a  href="{{ url('booksdetails?id=' . $book['id']) }}" >
                                            {{ $book->author }}</a>
                                        </div>
                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            {{-- <span class="old-price">$500.00</span> --}}
                                            <span class="price">JOD {{ $book->price }}.00</span>
                                        </div>
                                        <!-- End product price -->
                                        
                                    
                                        
                                        <!-- End Variant -->
                                    </div>
                                    <!-- End product details -->
                                    <!-- countdown start -->
                                    <div class="timermobile"><div class="saleTime desktop" data-countdown="2022/03/01"></div></div>
                                    <!-- countdown end -->
                              
                                </div>

                            @endforeach

                        </div>

                        </div>
                        <div style="height:100px">
                        {{ $books->links('pagination::bootstrap-5') }}

                        </div>
                    </div>

                    </div>


                                  
                  
                </div>
                <!--End Main Content-->
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    @endsection