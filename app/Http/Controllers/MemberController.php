<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller
{
    public function index(){
        $members = User::where('id','!=',auth()->user()->id)->withCount('borrowBook')->get();
        return view('admin_content.member.list_member')->with(compact('members'));
    }
    public function changeStatus(Request $request, $id){
        $user = User::where('id', $id)->first();
        $status = ($user->user_status=='disable') ? 'active':'disable';
        User::where('id', $id)->update(['user_status'=> $status]);
        return redirect()->back()->with('flash_message_success', 'Đã thay đổi trạng thái - '.$user->name.' !');
    }
    public function detailMember($id){
        $user = User::where('id', $id)->with('borrowBook')->first();
        // echo '<pre>';
        // print_r($user->borrowBook->toJson());
        // echo '</pre>';die;
        return view('admin_content.member.detail_member')->with(compact('user'));
    }
    public function deleteMember(Request $request, $id){
        User::where('id', $id)->delete();
        return redirect()->back()->with('flash_message_success', 'Đã xóa thành viên  !');;
    }
}
