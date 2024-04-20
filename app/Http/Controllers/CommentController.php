<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PDO;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::get();
        return response($comment);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $post_id = $request->post_id;

        $user = User::findOrFail($user_id);
        $post = Post::findOrFail($post_id);
    
        $comment = Comment::create([
            'comment_text' => $request->get('comment_text'),
            'post_id' => $post->id,
            'user_id' => $user->id
        ]);
    
        return response($comment);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json('No comment with that ID');
        }
    
        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json('Deleted');
    }
}
