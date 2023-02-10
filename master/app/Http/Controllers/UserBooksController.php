<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\UserBook;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserBooksController extends Controller
{
    public function index()
    {

        $categories = Category::orderBy('id','desc')->paginate(10);
        return view('pages.profile.create', compact('categories'));
    }

    

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'book_name' => 'required',
            'author' => 'required',
            'quote' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'sale_price' => 'required',
            'video' => 'required',
            'user_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            // 'image_01' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            // 'image_02' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            // 'image_03' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',


        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'usersimg/image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        if ($image = $request->file('image_02')) {
            $destinationPath = 'usersimg/image_01/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_02'] = "$profileImage";
        }
        if ($image = $request->file('image_01')) {
            $destinationPath = 'usersimg/image_02/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_01'] = "$profileImage";
        }
        if ($image = $request->file('image_03')) {
            $destinationPath = 'usersimg/image_03/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_03'] = "$profileImage";
        }

        print_r($input);

        UserBook::create($input);


        // $user_id= Auth::user()->id;
        $user_id= Auth::user()->id;

        return redirect()->action([ProfileController::class, 'index'], ['id' => $user_id])->with('success','Your Book Has Been Added successfully');

        // return redirect()->route('usedbooks.index')->with('success','Your Book Has Been Added successfully');
    }

}
