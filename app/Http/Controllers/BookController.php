<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        $books = (Auth::user()->role=='admin')?Book::get():Book::where('book_status','active')->with('user', 'getStatusBook')->get();
        // echo '<pre>';
        // print_r($books->toJson());
        // echo '</pre>';die;
        return view('admin_content.books.list_book')->with(compact('books'));
    }

    public function addBook(Request $request){
        if($request->isMethod('POST')){
            // Validate
            $request->validate([
                'cate_id'           => 'required|exists:categories,id',
                'book_code'         => 'required|unique:books|max:255',
                'book_name'         => 'required|unique:books|max:255',
                'book_qty'          => 'required|max:255',
                'book_image'        => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'book_description'  => 'required',
             ], [
                'cate_id.required'      => 'Vui lòng chọn loại sách !',
                'cate_id.exists'        => 'Loại sách không tồn tại !',
                'book_code.required'    => 'Mã sách không được bỏ trống !',
                'book_code.unique'      => 'Mã sách đã tồn tại !',
                'book_code.max'         => 'Mã sách quá dài !',
                'book_name.required'    => 'Tên sách không được bỏ trống !',
                'book_name.unique'      => 'Tên sách đã tồn tại !',
                'book_name.max'         => 'Tên sách quá dài !',
                'book_qty.required'     => 'Nhập số lượng sách !',
                'book_qty.max'          => 'Số lượng sách quá lớn !',
                'book_image.required'   => 'Chọn một hình ảnh cho quyển sách !',
                'book_image.mimes'      => 'Hãy chọn một hình ảnh !',
                'book_image.max'        => 'Kích thước hình ảnh quá lớn !',
                'book_description.required'      => 'Nhập mô tả cho quyển sách !',
            ]);
            $book = new Book;
            $book->cate_id = $request->cate_id;
            $book->user_id = $request->user()->id;
            $book->book_code = $request->book_code;
            $book->book_name = $request->book_name;
            $book->book_qty = $request->book_qty;
            $book->book_slug = slug($request->book_name);
            $book->book_image = isset($request->book_image)?uploadImage($request->book_image):'';
            $book->book_description = $request->book_description;
            isset($request->book_status) ? $book->book_status = 'active' : $book->book_status = 'disable';
            $book->save();
            return redirect('list-book')->with('flash_message_success', 'Thêm thành công !');
        }
        $categories = Category::get();
        return view('admin_content.books.add_book')->with(compact('categories'));
    }

    public function editBook(Request $request, $id){
        $book = Book::where('id', $id)->first();
        $categories = Category::get();
        if($request->isMethod('POST')){
            // Validate
            $request->validate([
                'cate_id'           => 'required|exists:categories,id',
                'book_code'         => 'required|unique:books,book_code,'.$id.'|max:255',
                'book_name'         => 'required|unique:books,book_name,'.$id.'|max:255',
                'book_qty'          => 'required|max:255',
                'book_image'        => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'book_description'  => 'required',
            ], [
                'cate_id.required'      => 'Vui lòng chọn loại sách !',
                'cate_id.exists'        => 'Loại sách không tồn tại !',
                'book_code.required'    => 'Mã sách không được bỏ trống !',
                'book_code.unique'      => 'Mã sách đã tồn tại !',
                'book_code.max'         => 'Mã sách quá dài !',
                'book_name.required'    => 'Tên sách không được bỏ trống !',
                'book_name.unique'      => 'Tên sách đã tồn tại !',
                'book_name.max'         => 'Tên sách quá dài !',
                'book_qty.required'     => 'Nhập số lượng sách !',
                'book_qty.max'          => 'Số lượng sách quá lớn !',
                'book_image.mimes'      => 'Hãy chọn một hình ảnh !',
                'book_image.max'        => 'Kích thước hình ảnh quá lớn !',
                'book_description.required'      => 'Nhập mô tả cho quyển sách !',
            ]);
            // VALIDATE DONE -- UPDATE BOOK
            Book::where('id', $id)->update([
                'cate_id' => $request->cate_id,
                'book_code' => $request->book_code,
                'book_name' => $request->book_name,
                'book_qty' => $request->book_qty,
                'book_slug' => slug($request->book_name),
                'book_image' => isset($request->book_image)?upDateImage($request->book_image, $book->book_image):$book->book_image,
                'book_description' => $request->book_description,
                'book_status' => (isset($request->book_status))?'active':'disable'
            ]);
            return redirect('list-book')->with('flash_message_success', 'Cập nhập thành công !');
        }
        return view('admin_content.books.edit_book')->with(compact('book','categories'));
    }

    public function deleteBook($id){
        $book = Book::where('id', $id)->first();
        if(file_exists(public_path('admin/img/books/'.$book->book_image))){
            unlink(public_path('admin/img/books/'.$book->book_image));
        }
        Book::where('id', $id)->delete();
        return redirect('list-book')->with('flash_message_success', 'Xóa sách thành công !');
    }
}
