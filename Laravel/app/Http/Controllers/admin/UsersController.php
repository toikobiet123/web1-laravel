<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function user_create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request){

        // $data = $request->all();

        // $data['password'] = Hash::make($request->password);


        // Users::create($data);
        // echo"success create user";
         $userInfo = new User;

        $userInfo->name = $request->name;
        $userInfo->email = $request->email;
        $userInfo->password = Hash::make($request->password);

        $userInfo->save();
        return \redirect()->route('user.list');
    }
    public function index()
    {
        $users = User::all();
        return \view('admin.user.index', \compact('users'));
    }
    public function changeRole($id)
    {
        $user = User::select('role_as')->where('id', $id)->first();
        if($user->role == 0)
        $role = 1;
        $user->where('id', $id)->update(['role_as'=>$role]);
        return \redirect()->back();
    }
}
