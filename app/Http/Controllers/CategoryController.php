<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin_content.categories.list_categories')->with(compact('categories'));
    }

    public function addCategory(Request $request){
        if($request-> isMethod('POST')){
            // Validate
            $request->validate([
                'cate_name' => 'required|unique:categories|max:255|regex:/^[a-z0-9\s]+$/i'
            ], [
                'cate_name.required' => 'Tên danh mục không được bỏ trống',
                'cate_name.unique'   => 'Tên danh mục đã tồn tại',
                'cate_name.max'      => 'Tên danh mục quá dài',
                'cate_name.regex'    => 'Tên danh mục không hợp lệ'
            ]);
            // Thêm Category
            $category = new Category;
            $category->cate_name = $request->cate_name;
            $category->cate_slug = slug($request->cate_name);
            isset($request->status) ? $category->cate_status = 'active' : $category->cate_status = 'disable';
            $category->save();
            return redirect('list-categories')->with('flash_message_success', 'Thêm thành công !');
        }
        return view('admin_content.categories.add_category');
    }

    public function editCategory(Request $request, $id){
        if($request->isMethod('POST')){
            // For Validate
            $request->validate([
                'cate_name' => 'required|max:255|unique:categories,cate_name,'.$id
            ], [
                'cate_name.required' => 'Tên danh mục không được bỏ trống',
                'cate_name.unique'   => 'Tên danh mục đã tồn tại',
                'cate_name.max'      => 'Tên danh mục quá dài',
            ]);
            // Validate done -- Add
            Category::where('id', $id)->update([
                'cate_name' => $request->cate_name,
                'cate_slug' => slug($request->cate_name),
                'cate_status' => (isset($request->status))?'active':'disable'
            ]);
            return redirect('list-categories')->with('flash_message_success', 'Cập nhập thành công !');;
        }
        $category = Category::where('id',$id)->first();
        return view('admin_content.categories.edit_category')->with(compact('category'));
    }

    public function deleteCategory(Request $request, $id){
        Category::where('id', $id)->delete();
        return redirect('list-categories')->with('flash_message_success', 'Xóa loại sách thành công !');
    }
}
