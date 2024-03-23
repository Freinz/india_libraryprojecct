<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

use App\Models\Borrow;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
 
    public function index () {

        $data = Book::all();

        return view('home.index', compact('data'));
    }

    public function book_details($id) {

        $data = Book::find($id);

        return view('home.book_details', compact('data'));

    }

    public function borrow_books($id) {

        $data = Book::find($id);

        $book_id = $id;

        $quantity = $data->quantity;

            if ($quantity >= '1') {

                if (Auth::id()) {

                    $user_id = Auth::user()->id;

                    $borrow = new Borrow;

                    $borrow->book_id = $book_id;

                    $borrow-> user_id = $user_id;

                    $borrow->status = 'Applied';


                    $borrow->save();

                    return redirect()->back()->with('message', 'A Request is send to admin to borrow this book');

                } else {

                    return redirect('/login');

                }


            } else {

                return redirect()->back()->with('message', 'Not Engough Book Available');

            }

    }

    public function book_history() {

        if (Auth::id()) {

            $userid = Auth::user()->id; // read data dari user dengan menarik id

            $data = Borrow::where('user_id', '=', $userid)->get();

            return view('home.book_history', compact('data'));

        }

    }

    public function cancel_req($id) {

        $data = Borrow::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book Borrow Request Cancel Succesfully');

    }

    public function explore() {

        $data = Book::all(); // agar $data as $data bekerja

        return view('home.explore', compact('data'));

    }


}
