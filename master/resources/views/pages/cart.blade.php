@extends('layouts/master')
@section('content')

<link href="{{ asset('admindashboard/build/css/deletemodal.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

       
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="alert alert-success text-uppercase" role="alert">
						<i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Congratulations!</strong> You've got free shipping!
					</div>
                	<form action="#" method="post" class="cart style2">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                    		<tbody>
                                <span class="visually-hidden">
                                    {{ $total=0 }} 
                                {{isset($books)}}
                            </span>

                                @if(session()->has('cart.books'))
                                @foreach ($books as $book)    
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#"><img class="cart__image" src="usersimg/image/{{ $book->image }}" alt="{{ $book->book_name }}"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">{{ $book->book_name }} </a>
                                        </div>
                                        
                                        <div class="cart__meta-text">
                                            Author: {{ $book->author }}
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">JOD {{ $book->price }}.00</span>
                                    </td>
                                   
                                    {{-- @for ($i=1; $i<20; $i++)  --}}
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                @foreach ($cart as $key => $value)
                                                @if($key==$book->id)
                                               </a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="{{ $value }}" pattern="[0-9]*" disabled>
                                               </a>
                                            </div>
                                         
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">JOD {{ $value*$book->price }}.00</span></div>
                                    </td>
                                    <span class="visually-hidden">

                                    {{ $total=$total+$value*$book->price }}
                                    </span>
                                    @endif
                                    @endforeach
                                   
                                    <td class="text-center">
                                        <form action="{{ route('cart.store',$key) }}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                            
                                               <input type="hidden" name="key" value="{{ $key }}"/>
                                               <input type="hidden" name="value" value="{{ $value }}"/>

                                             
                                               <button type="submit" class="btn btn-danger">  <a href="#myModal" class="trigger-btn" data-toggle="modal" style="color: white">  <i class="fa fa-trash-o"></i>Delete</a></button>   
                                                                               </form>
                                       </td>

                                </tr>
                                                                   
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
              <form action="{{ route('cart.store',$key) }}" method="Post" enctype="multipart/form-data">
                @csrf
                
                   <input type="hidden" name="key" value="{{ $key }}"/>
                   <input type="hidden" name="value" value="{{ $value }}"/>

                 

                   <button type="submit" class="btn btn-danger" > <i class="fa fa-trash-o"></i>Delete</button>   
                </form>
            </div>
          </div>
        </div>
      </div>   
                                @endforeach
                                @endif
                                @if(session()->has('cart.usedbooks'))                               
                                  @foreach ($usedbooks as $book)    
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#"><img class="cart__image" src="usersimg/image/{{ $book->image }}" alt="{{ $book->book_name }}"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">{{ $book->book_name }} </a>
                                        </div>
                                        
                                        <div class="cart__meta-text">
                                            Author: {{ $book->author }}
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">JOD {{ $book->price }}.00</span>
                                    </td>
                                   
                                  
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                @foreach ($usedcart as $key => $value)
                                                @if($key==$book->id)
                                               
                                                <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="{{ $value }}" pattern="[0-9]*" disabled>
                                               
                                            </div>
                                         
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money">JOD {{ $value*$book->price }}.00</span></div>
                                    </td>
                                    {{ $total=$total+$value*$book->price }}
                                   
                                   
                                     <td class="text-center">
                                        <form action="{{ route('cart.store',$key) }}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                            
                                               <input type="hidden" name="key" value="{{ $key }}"/>
                                               <input type="hidden" name="value" value="{{ $value }}"/>

                                             
                                               <button type="submit" class="btn btn-danger" > <i class="fa fa-trash-o"></i>Delete</button>   
                                                                               </form></td>
                                     @endif
                                     @endforeach 
                                </tr>
                                @endforeach
                                @endif 


                              
                            </tbody>
                    		<tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="/booksuser" class="btn btn-secondary btn--small cart-continue">Continue shopping</a></td>
                                    <td colspan="3" class="text-right">
	                                
                                    </td>
                                </tr>
                            </tfoot>
                    </table> 
                    </form>                   
               	</div>
                
                
                <div class="container mt-4">
                    <div class="row">
                    
                       
                        
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer" style="margin-left: 35%">
                            <div class="solid-border">	
                              <div class="row border-bottom pb-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                <span class="col-12 col-sm-6 text-right"><span class="money">JOD {{ $total }}.00</span></span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
                                <span class="col-12 col-sm-6 text-right">JOD 10.00</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                                <span class="col-12 col-sm-6 text-right">Free shipping</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">JOD {{ $total+3 }}.00</span></span>
                              </div>
                              <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                              @if (Auth::check())
                              <form method="POST" action="{{ route('checkoutstepone.store') }}">
                                @csrf
                              <p class="cart_tearm">
                                <label>
                                  <input type="checkbox" name="tearm" class="checkbox" value="tearm" required="">
                                  I agree with the terms and conditions
								</label>
                              </p>
                              <input type="hidden" value=" {{ $total+3 }}" name="total_price"/>

                              <input type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Proceed To Checkout" >
                              
                              {{-- <div class="paymnet-img"><img src="assets/images/payment-img.jpg" alt="Payment"></div>
                              <p><button type="submit">Checkout with Multiple Addresses</button></p> --}}
                              </form>
                              @else
                              <p>Please <a href="/login">Log in</a> or <a href="/register">Create an account</a> to continue checking out process</p>
                              @endif
                            </div>
        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
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
</div>
</body>

<!-- belle/cart-variant1.html   11 Nov 2019 12:44:32 GMT -->
</html>
@endsection