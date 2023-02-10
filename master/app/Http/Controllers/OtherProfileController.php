<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Models\UserBook;

use Illuminate\Http\Request;

class OtherProfileController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::orderBy('id','desc')->paginate(10);
        $userid= User::findOrFail($request['id']) ;
        $user = User::orderBy('id','desc')->where('id',$userid['id'])->paginate(20);
        $books = UserBook::orderBy('id','desc')->where('user_id',$userid['id'])->where('is_sold','0')->paginate(20);
        $total_books= DB::table('user_books')->where('user_id',$userid['id'])->count('id');
        $total_sold_books= DB::table('user_books')->where('user_id',$userid['id'])->where('is_sold','1')->count('id');
        $total_unsold_books= DB::table('user_books')->where('user_id',$userid['id'])->where('is_sold','0')->count('id');

        return view('pages.profile.otherprofiles', compact('categories','books','user','total_books','total_sold_books','total_unsold_books'));
    }
}
