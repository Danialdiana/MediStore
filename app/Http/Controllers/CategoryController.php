<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('adm.category',['category'=>Category::all()]);
    }


    public function store(Request $request)
    {
        $validated=$request->validate([
            'category'=>'required|max:255'
        ]);

        Category::create($validated)->with('message','Successfully');

        return back();
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
