<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/dang-nhap', 'IndexController@login')->name('dang-nhap');
Route::match(['get', 'post'], '/dang-ky', 'IndexController@register')->name('dang-ky');
Route::middleware(['auth'])->group(function () {
        Route::get('/', 'IndexController@dashboard')->name('dashboard');
        Route::post('dang-xuat', 'IndexController@logout')->name('dang-xuat');

    // II, For Book
        Route::get('list-book', 'BookController@index')->name('list-book');
    // III, For Borrow Book
        Route::get('list_borrow', 'BorrowBookController@index');
        Route::post('borrow-book/{id}', 'BorrowBookController@borrowBook');
    // Permission for admin
        Route::middleware(['admin'])->group(function () {
            // I, For category
            Route::get('list-categories', 'CategoryController@index')->name('list-categories');
            Route::match(['get', 'post'], 'add-category', 'CategoryController@addCategory')->name('add-category');
            Route::match(['get', 'post'], 'edit-category/{id}', 'CategoryController@editCategory')->name('edit-category');
            Route::post('delete-category/{id}', 'CategoryController@deleteCategory')->name('delete-category');

            // II, For Book
            Route::match(['get', 'post'], 'add-book', 'BookController@addBook')->name('add-book');
            Route::match(['get', 'post'], 'edit-book/{id}', 'BookController@editBook')->name('edit-book');
            Route::post('delete-book/{id}', 'BookController@deleteBook')->name('deleteBook');

            //  III, For Member
            Route::get('list-member', 'MemberController@index')->name('list-member');
            Route::get('detail-member/{id}', 'MemberController@detailMember')->name('detail-member');
            Route::post('change-status/{id}', 'MemberController@changeStatus')->name('change-status');
            Route::post('delete-member/{id}', 'MemberController@deleteMember')->name('delete-member');
        });
});
