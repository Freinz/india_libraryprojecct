<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index ()
    {

        if (Auth::id()) //cek user login atau belum
        {
            $user_type = Auth()->user()->usertype;
        
            if($user_type == 'admin') {
                return view('admin.index');
            }

            else if ($user_type == 'user') {
                return view('home.index');
            }

        }

        else {
            return redirect()->back();
        }

    }

    public function category_page () {

        return view('admin.category');
    }
    
    public function add_category (Request $request) {
        
        $data = new Category;

        $data->cat_title = $request->category;

        $data->save();

        return redirect()->back();
       
    }
}
