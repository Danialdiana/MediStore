<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function orders(){
        $p=Cart::where('sales',"korzinadaEmes")->with(['preparat','user'])->get();
        return view('adm.orders',['p'=>$p]);
    }

    public function profIndex(){
        return view('profile.index',['user'=>Auth::user()]);
    }

    public function profStore(Request $request,User $user){
        $validated=$request->validate([
            'image'=>'image|required|mimes:jpg,jpeg,png,pdf,doc,gif,svg'
        ]);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extenstion=$file->getClientOriginalExtension();
            $filename=time().'.'.$extenstion;
            $file->move('uploads/ava',$filename);
            $user->image=$filename;
        }
        $user->update($validated);
        return redirect()->route('profile.index')->with('message',__('message.sImg').app()->getLocale());
    }

    public function paymentStore(Request $request,User $user){
        $user->update([
            'number'=>$request->number,
            'year'=>$request->year,
            'cvc'=>$request->cvc,
            'summa'=>$user->summa+$request->summa
        ]);
        return back()->with('message','Ваш баланс пополнен.');
    }
}
