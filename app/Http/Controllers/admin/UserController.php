<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showUsers(){
        $users = User::select()->orderBy('id', 'DESC')->get();
        return view('admin.users',[
            'users'=>$users,
        ]);
    }

    public function activeUser($id){
        $user=User::find($id);
        if($user->is_active )
            $user->is_active=0;
        else 
            $user->is_active=1;
        if($user->save())
        return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user->delete()) 
        return redirect()->back()->with(['success' => 'Data Delete successfully']);

    }
}