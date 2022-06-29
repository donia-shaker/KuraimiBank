<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showUsers(){
        $users = User::select()->orderBy('id', 'DESC')->get();
        $perimissions = Permission::get();
        // dd($perimission);
        return view('admin.users',[
            'users'=>$users,
            'perimissions'   => $perimissions
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

    public function updatePermission(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(),[
            'permission'=>['required'],
        ]);
        $id = $request->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->update();
        if($request->permission)
        $user->syncPermissions($request->permission);
        else if (!$user->hasRole('super_admin'))
            $user->detachPermissions(['manage_content','all_dashboard','manage_location','manage_services']);
            else
            return redirect()->back()->with(['error'=>' لاتسطيع الغاء جميع صلاحيات مدير الموقع']);
        if ($user)
            return redirect()->back()->with(['success'=>' تم التعديل بنجاح']);
    }
}