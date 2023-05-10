<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\Preparat;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreparatController extends Controller{

    public function index(){
        return view('preparat.index',['preparats'=>Preparat::all(),'categories'=>Category::all(),'types'=>Type::all()]);
    }


    public function create(){
        $this->authorize('create',Preparat::class);
        return view('preparat.create',['categories'=>Category::all(),'types'=>Type::all()]);
    }


    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|max:255',
            'content'=>'required',
            'price'=>'required|numeric',
            'term'=>'required',
            'country'=>'required',
            'company'=>'required',
            'category_id'=>'required|numeric|exists:categories,id',
            'type_id'=>'required|numeric|exists:types,id',
            'image'=>'required'
        ]);

        $preparat=new Preparat();
        $preparat->name=$request->input('name');
        $preparat->content=$request->input('content');
        $preparat->price=$request->input('price');
        $preparat->term=$request->input('term');
        $preparat->country=$request->input('country');
        $preparat->company=$request->input('company');
        $preparat->category_id=$request->input('category_id');
        $preparat->types_id=$request->input('type_id');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extenstion=$file->getClientOriginalExtension();
            $filename=time().'.'.$extenstion;
            $file->move('uploads/',$filename);
            $preparat->image=$filename;
        }
        $preparat->save($validated);
        return redirect()->route('preparats.index')->with('message',__('message.pStore').app()->getLocale());
    }

    public function show(Preparat $preparat,Comment $comment){
        if (Auth::user()){
            $count=Auth::user()->preparats()->where('preparat_id',$preparat->id)->first();

            $myCount=0;
            if($count !=null){
                $myCount=$count->pivot->count;
            }
        }
        else{
            $myCount=0;
        }
        return view('preparat.show',['preparat'=>$preparat,'categories'=>Category::all(),'comment'=>$preparat->comments,'count'=>$myCount]);
    }


    public function edit(Preparat $preparat){
        $this->authorize('update',$preparat);
        return view('preparat.edit',['preparat'=>$preparat,'categories'=>Category::all(),'types'=>Type::all()]);
    }


    public function update(Request $request, Preparat $preparat)
    {
        $this->authorize('update',$preparat);
        $validated=$request->validate([
            'name'=>'required|max:255',
            'name_kz'=>'required|max:255',
            'name_ru'=>'required|max:255',
            'name_en'=>'required|max:255',
            'content'=>'required',
            'content_kz'=>'required',
            'content_ru'=>'required',
            'content_en'=>'required',
            'price'=>'required|numeric',
            'term'=>'required',
            'term_kz'=>'required',
            'term_en'=>'required',
            'term_ru'=>'required',
            'country'=>'required',
            'country_en'=>'required',
            'country_kz'=>'required',
            'country_ru'=>'required',
            'company'=>'required',
            'company_kz'=>'required',
            'company_ru'=>'required',
            'company_en'=>'required',
            'category_id'=>'required|numeric|exists:categories,id',
            'type_id'=>'required|numeric|exists:types,id'
        ]);

        $preparat->name=$request->input('name');
        $preparat->name_kz=$request->input('name_kz');
        $preparat->name_ru=$request->input('name_ru');
        $preparat->name_en=$request->input('name_en');
        $preparat->content=$request->input('content');
        $preparat->content_kz=$request->input('content_kz');
        $preparat->content_ru=$request->input('content_ru');
        $preparat->content_en=$request->input('content_en');
        $preparat->price=$request->input('price');
        $preparat->term=$request->input('term');
        $preparat->term_kz=$request->input('term_kz');
        $preparat->term_ru=$request->input('term_ru');
        $preparat->term_en=$request->input('term_en');
        $preparat->country=$request->input('country');
        $preparat->country_kz=$request->input('country_kz');
        $preparat->country_ru=$request->input('country_ru');
        $preparat->country_en=$request->input('country_en');
        $preparat->company=$request->input('company');
        $preparat->company_kz=$request->input('company_kz');
        $preparat->company_ru=$request->input('company_ru');
        $preparat->company_en=$request->input('company_en');
        $preparat->category_id=$request->input('category_id');
        $preparat->types_id=$request->input('type_id');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extenstion=$file->getClientOriginalExtension();
            $filename=time().'.'.$extenstion;
            $file->move('uploads/',$filename);
            $preparat->image=$filename;
        }
        $preparat->update($validated);
        return redirect()->route('preparats.index')->with('message',__('message.pUpdate').app()->getLocale());
    }


    public function destroy(Preparat $preparat)
    {
        $this->authorize('delete',$preparat);
        $preparat->delete();
        return redirect()->route('preparats.index');
    }

    public function ByCategory(Category $category){
        return view('preparat.index',['preparats'=>$category->preparats,'categories'=>Category::all()]);
    }

    public function cart(Request $request,Preparat $preparat){
        $validated=$request->validate([
            'count'=>'required|min:1|max:10'
        ]);

        $pr=Auth::user()->preparats()->where('preparat_id',$preparat->id)->first();

        if ($pr != null){
            Auth::user()->preparats()->updateExistingPivot($request->input('preparat_id'),['count'=>$request->input('count'),'sales'=>false]);
        }else{
            Auth::user()->preparats()->attach($request->input('preparat_id'),['count'=>$request->input('count')]);

        }

        return back()->with('message',__('message.saved'));
    }

    public function cartIndex(){
        $sum=0;
        $prep=Auth::user()->preparatsWS("korzinada")->get();
        if ($prep!=null){
            foreach ($prep as $p){
                $sum+=($p->pivot->sales == "korzinadaEmes" ? 0 :$p->pivot->count * $p->price);
            }
        }
        return view('cart.index',['sum'=>$sum,'categories'=>Category::all(),'preparat'=>$prep]);
    }
    public function cartDestroy(Preparat $preparat){
        $pr=Auth::user()->preparatsWS("korzinada")->where('preparat_id',$preparat->id)->first();

        if ($pr != null){
            Auth::user()->preparatsWS("korzinada")->detach($preparat->id);
        }

        return back()->withErrors(__('message.pDelete').app()->getLocale());
    }

    public function sales(Preparat $preparat,Payment $payment){
        $b=Auth::user()->summa;
        $ids=Auth::user()->preparatsWS("korzinada")->allRelatedIds();
        $prep=Auth::user()->preparatsWS("korzinada")->get();

        $sum=0;

        if ($prep!=null){
            foreach ($prep as $p){
                $sum+=($p->pivot->sales == "korzinadaEmes" ? 0 :$p->pivot->count * $p->price);
            }
        }

        if ($b>=$sum){
            foreach ($ids as $id){
                Auth::user()->preparatsWS("korzinada")->updateExistingPivot($id,['sales'=>"korzinadaEmes"]);
            }

            Auth::user()->update([
                'summa'=> $b - $sum
            ]);

            return back()->with('message',__('message.buy'));
        }else{
            return back()->with('message',__('message.bnot'));
        }

    }

    public function cartStory(){
        $prep=Auth::user()->preparatsWS("Ryksat")->get();
        return view('cart.story',['prep'=>$prep]);
    }

    public function select(Preparat $preparat){
        $pr=Auth::user()->products()->where('preparat_id',$preparat->id)->first();

        if ($pr != null){
            Auth::user()->products()->updateExistingPivot($preparat->id,[$preparat->id]);
        }else{
            Auth::user()->products()->attach($preparat->id);
        }
        return back()->with('message',__('message.saved'));
    }

    public function selectIndex(){
        $prep=Auth::user()->products()->get();
        return view('select.index',['preparats'=>$prep]);
    }

    public function selectDestroy(Preparat $preparat){
        Auth::user()->products()->detach($preparat->id);
        return back()->with('message',__('message.removed'));
    }
}
