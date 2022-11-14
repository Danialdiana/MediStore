<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Preparat;
use App\Models\Type;
use Illuminate\Http\Request;

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
        return redirect()->route('preparats.index')->with('message','Post satty saktaldy!');
    }

    public function show(Preparat $preparat,Comment $comment){
        return view('preparat.show',['preparat'=>$preparat,'categories'=>Category::all(),'comment'=>$preparat->comments]);
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
            'content'=>'required',
            'price'=>'required|numeric',
            'term'=>'required',
            'country'=>'required',
            'company'=>'required',
            'category_id'=>'required|numeric|exists:categories,id',
            'type_id'=>'required|numeric|exists:types,id'
        ]);

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
        $preparat->update($validated);
        return redirect()->route('preparats.index')->with('message','Post satty ondeldy!');
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

}
