<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\UserBook;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookUserController extends Controller
{
    public function index()
    {
         $books = Book::orderBy('id','desc')->paginate(8);
         $categories = Category::orderBy('id','desc')->paginate(20);
          $authors = Book::select('author')->distinct()->get();

          $populerbooks= DB::table('cart_items')
          ->select('book_id',DB::raw('COUNT(quantity) as book_id'))
          ->groupBy('quantity')
          ->orderBy('book_id', 'desc')
          ->take(10);
          
          $rendombooks= Book::select('*')
          ->inRandomOrder()
          ->limit(4) // here is yours limit
          ->get();
     
        //   dd($populerbooks);
        return view('pages.shop', compact('books', 'categories','authors','rendombooks'));
    }


       /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\UserBook  $movie
    * @return \Illuminate\Http\Response
    */

    public function edit(Request $request)
    {
        $book=DB::table('user_books')
        ->select('*')
        // ->join('categories','categories.id','=','user_books.category_id')
        ->where('user_books.id','=',$request['id'])
        ->get();
         
        // dd($book);
        $category = Category::whereId($book[0]->category_id);

        
        $categories = Category::orderBy('id','desc')->paginate(5);

        // dd($book);

        return view('pages.profile.editbook',compact('book','categories','category'));
    }
     /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Book  $movie
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'id' => 'required',
            'book_name' => 'required',
            'author' => 'required',
            'quote' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'sale_price' => 'required',
            'video' => 'required',
            'user_id' => 'required',

               
        ]);
        // dd($id);
        $input = request()->except(['_token', '_method','submit','12','0' ]);
        $input= array([0]);
        // dd($input);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('usersimg/image'), $filename);
            $input['image']= $filename;
        }else{
            unset($input['image']);
        }

        if($request->file('image_01')){
            $file= $request->file('image_01');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('usersimg/image_01'), $filename);
            $input['image_01']= $filename;
        }else{
            unset($input['image_01']);
        }

        if($request->file('image_02')){
            $file= $request->file('image_02');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('usersimg/image_02'), $filename);
            $input['image_02']= $filename;
        }else{
            unset($input['image_02']);
        }

        if($request->file('image_03')){
            $file= $request->file('image_03');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('usersimg/image_03'), $filename);
            $input['image_03']= $filename;
        }else{
            unset($input['image_03']);
        }

        UserBook::whereId($request->id)->update([
            'book_name'=>$request->book_name,
            'quote'=>$request->quote,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'sale_price'=>$request->sale_price,

            'video'=>$request->video,
            // 'image'=>$input['image'],
            // 'image_01'=>$input['image_01'],
            // 'image_02'=>$input['image_02'],
            // 'image_03'=>$input['image_03'],

        ]);
       
       

        $user_id= $request->user_id;

                return redirect()->action([ProfileController::class, 'index'], ['id' => $user_id]);


    }

    public function destroy(UserBook $book, $id)
    {
        // dd($id);
        UserBook::whereId($id)->delete();
        return redirect()->back()->withErrors(['msg', 'The Message']);
    }

}
