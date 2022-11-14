<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        return view('adm.types',['types'=>Type::all(),'category'=>Category::all()]);
    }



    public function store(Request $request)
    {
        $validated=$request->validate([
            'category_id'=>'required|numeric|exists:categories,id',
            'type'=>'required'
        ]);

        Type::create($validated);

        return back();
    }


    public function edit(Type $type)
    {
        //
    }

    public function update(Request $request, Type $type)
    {
        //
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return back();
    }
}
