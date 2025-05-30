<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request, $post_id)
    {
        $request->validate([
            'comment' => 'required|min:1|max:150'
        ]);

        $this->comment->user_id = Auth::user()->id; //who created the comment
        $this->comment->post_id = $post_id; //what post was commented
        $this->comment->body = $request->comment; //what is the comment

        $this->comment->save();

        return redirect()->back();
    }

    public function destroy($id){

        $this->comment->destroy($id);

        return back();
    }
}
