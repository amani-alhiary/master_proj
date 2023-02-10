<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $usedcart = array();
        $usedbooks = array();
        $usedids = array();
        $cart = array();
        $books = array();
        $ids = array();

        if (session()->has('cart.books')) {
            $quantity = array();
            $ids = array();
            foreach (session()->get('cart.books') as $key => $value) {
                array_push($ids,$key);
                array_push($quantity,$value);
    
            }
            $books = DB::table('books')
                ->whereIn('id', $ids)
                ->get();
    
    
            $cart= session('cart.books');
        }
        if (session()->has('cart.usedbooks')) {
            $usedquantity = array();
            $usedids = array();
            
            foreach (session()->get('cart.usedbooks') as $key => $value) {
                array_push($usedids,$key);
                array_push($usedquantity,$value);
    
            }
            $usedbooks = DB::table('user_books')
                ->whereIn('id', $usedids)
                ->get();
    
    
            $usedcart= session('cart.usedbooks');
            // dd($usedcart);
           

        }
        // dd(session('cart'));
        return view('pages.cart', compact('usedcart','usedbooks','usedids','cart','books','ids'));





    }


    public function store(Request $request)
    {
        // dd($request);
        $keydel=$request->key;
        $valdel=$request->value;

        session()->pull('key',$keydel);

        if (session()->has('cart.books')) {
            session()->get('cart.books');
            session()->forget("cart.books.$request->key");
                    // $sess= session('cart.books');
                    // @unlink($request->key);
                    // session()->pull('cart');
             
                    // session()->set($newsession);
            }
      

        if (session()->has('cart.usedbooks')) {
           
         
            session()->get('cart.usedbooks');
            session()->forget("cart.usedbooks.$request->key");
          

        }
        // dd(session('cart'));

        // $cart_usedbooks = Session::get('cart.usedbooks');
        // if(($request->key = array_search($request->key, $cart_usedbooks)) !== false) {
        //     unset($cart_usedbooks[$key]);
        // }
        
        // session()->put('cart.usedbooks', $cart_usedbooks);

        return redirect()->back()
        ->with('success', 'Item had been added successfully.');

        // dd($request);
    }
}
