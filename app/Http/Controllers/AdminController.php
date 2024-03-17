<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Book;

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

        $data = Category::all();

        return view('admin.category', compact('data'));
    }
    
    public function cat_add (Request $request) {
        
        $data = new Category;

        $data->cat_title = $request->category;

        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
       
    }

    public function cat_delete($id) {

        $data = Category::find($id); // Category dari nama models

        $data->delete();

        return redirect()->back()->with('message', 'category deleted succesfully'); // agar kembali ke page yang sama
        
    }
    
    public function cat_read($id) {

        $data = Category::find($id);

        return view('admin.update', compact('data'));

    }

    public function cat_update(Request $request, $id) {


        $data = Category::find($id);

        $data->cat_title = $request -> cat_name;

        $data->save();

        return redirect('/category_page')->with ('message', 'Category Updated Succesfully'); // untuk kembali ke page awal setelah edit

    }

    public function add_book() {

        $data = Category::all();

        return view('admin.add_book', compact('data'));

    }

    public function store_book(Request $request) {

        $data = new Book;

        $data->title = $request->book_name;
        
        $data->auther_name = $request->auther_name;
        
        $data->price = $request->price;
        
        $data->quantity = $request->quantity;
        
        $data->description = $request->description;
        
        $data->category_id = $request->category;

        $book_image = $request->book_img;

        $auther_image = $request->auther_img;

        if ($book_image) {

            $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

            $request->  book_img->move('book',$book_image_name);

            $data->book_img = $book_image_name;
        }
        
        if ($auther_image) {

            $auther_image_name = time().'.'.$auther_image->getClientOriginalExtension();

            $request->  auther_img->move('auther',$auther_image_name);

            $data->auther_img = $auther_image_name;
        }

        $data->save();

        return redirect()->back();

    }

    public function show_book() {

        $book = Book::all() ;

        return view('admin.show_book', compact('book'));

    }

    public function book_delete($id) {

        $data = Book::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book has Deleted Succesfully');

    }

}
