<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $user=null;
        if ($request->search){
            $user=User::where('name','LIKE','%'.$request->search.'%')->
                orWhere('email','LIKE','%'.$request->search.'%')->with('role')->get();
        }else{
            $user=User::with('role')->get();
        }
        return view('adm.users',['users'=>$user]);
    }

    public function ban(User $user){
        $user->update([
            'is_active'=>false,
        ]);
        return back();
    }

    public function unban(User $user){
        $user->update([
            'is_active'=>true,
        ]);
        return back();
    }

    public function edit(User $user){
        return view('adm.roles',['roles'=>Role::all(),'users'=>$user]);
    }

    public function update(Request $request,User $user){
        $validated=$request->validate([
            'role_id'=>'required|numeric|exists:roles,id',
        ]);

        $user->update($validated);

        return back();
    }

}
