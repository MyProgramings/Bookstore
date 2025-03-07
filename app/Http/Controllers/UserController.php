<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $user->administration_level = $request->administration_level;
        $user->save();
        
        session()->flash('flash_message','تم تعديل صلاحيات المستخدم بنجاح');
     
        return redirect(route('users.index'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('flash_message','تم حذف المستخدم بنجاح');
        return redirect(route('users.index'));
    }
}
