<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request){
        $validated=$request->validate([
            'content'=>'required',
            'preparat_id'=>'required|numeric|exists:preparats,id'
        ]);
        Auth::user()->comments()->create($validated);
        return back()->with('message','Ваш отзыв сохранен');
    }


    public function edit(Comment $comment){
        $this->authorize('update',$comment);
        return view('comment.edit',['preparat'=>$comment->preparat,'comment'=>$comment,'categories'=>Category::all()]);
    }


    public function update(Request $request, Comment $comment){
        $validated=$request->validate([
            'content'=>'required',
            'preparat_id'=>'required|numeric|exists:preparats,id'
        ]);
        $comment->update($validated);
        return redirect()->route('preparats.show',['preparat'=>$comment->preparat]);
    }


    public function destroy(Comment $comment){
        $this->authorize('delete',$comment);
        $comment->delete();
        return redirect()->route('preparats.show',['preparat'=>$comment->preparat])->with('message','Ваш отзыв удален');
    }
}
