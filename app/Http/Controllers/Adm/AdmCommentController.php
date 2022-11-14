<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Preparat;
use Illuminate\Http\Request;

class AdmCommentController extends Controller
{
    public function index(Request $request){
        $comment=null;
        if ($request->search){
            $comment=Comment::where('content','LIKE','%'.$request->search.'%')->with('preparat')->get();
        }else{
            $comment=Comment::all();
        }
        return view('adm.comments',['comment'=>$comment]);
    }
}
