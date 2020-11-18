<?php

namespace App\Http\Controllers;

use App\BorrowBook;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use DB;

class BorrowBookController extends Controller
{
    public function index(Request $request){
        $user = User::where('id', $request->user()->id)->with('borrowBook', 'borrowedBook')->first();
        // $borrowBook = BorrowBook::where('user_id', $request->user()->id)->with('books')->get();
        // $book = DB::table('borrow_books')->where('id', '=', $request->user()->id)->join('books', 'books.id', '=', 'borrow_books.book_id')
        //                           ->select(['borrow_books.*', 'books.*'])->get();
        // echo '<pre>';
        // print_r($book->toJson());
        // echo '</pre>';die;
        return view('admin_content.borrow_book.list_borrow')->with(compact(('user')));
    }
    public function borrowBook(Request $request, $id){
        $borrow = new BorrowBook;
        $borrow->book_id = $id;
        $borrow->user_id = $request->user()->id;
        $borrow->save();
        return redirect('/list-book')->with('flash_message_success', 'Mượn sách thành công !');
    }
}
