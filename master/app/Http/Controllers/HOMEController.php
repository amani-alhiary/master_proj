<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class HOMEController extends Controller
{
    public function index(Request $request )
    {
     $books= Book::select('*')
     ->inRandomOrder()
     ->limit(12) // here is yours limit
     ->get();

     
    //  dd($books);
    // Return the search view with the resluts compacted
    return view('index',compact('books'));
    }
}
