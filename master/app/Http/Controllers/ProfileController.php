<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Models\UserBook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::orderBy('id','desc')->paginate(10);
        $userid= User::findOrFail($request['id']) ;
        $books = UserBook::orderBy('id','desc')->where('user_id',$userid['id'])->paginate(20);
        $total_books= DB::table('user_books')->where('user_id',$userid['id'])->count('id');
        $total_sold_books= DB::table('user_books')->where('user_id',$userid['id'])->where('is_sold','1')->count('id');
        $total_unsold_books= DB::table('user_books')->where('user_id',$userid['id'])->where('is_sold','0')->count('id');

        // dd($total_books);
        return view('pages.profile.profile', compact('categories','books','total_books','total_sold_books','total_unsold_books'));
    }

       /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */

    public function edit(Request $request)
    {
        // $userid= Auth::user()->id;
        // dd($userid);
        return view('pages.profile.editprofile');
    }



    public function update(Request $request, User $user)
    {
        $request->validate([
            'id' => 'required',
            
            'name' => 'required',
            'email' => 'required',
            // 'image' => 'required',
            

        ]);
        $input = $request->all();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('usersimg/image'), $filename);
            $input['image']= $filename;
        }else{
            unset($input['image']);
        }
        $input = request()->except(['_token', '_method','submit' ]);

        // $user->fill($input)->save();
          User::whereId($request->id)->update($input);


          $user_id= Auth::user()->id;
          return redirect()->action([ProfileController::class, 'index'], ['id' => $user_id]);

        //   return view('pages.profile.profile', compact('categories','books'));
            }
}
