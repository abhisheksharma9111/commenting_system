<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
            'parent_comment_id' => 'nullable|exists:comments,id',
        ]);

        $depth = 0;
        if ($request->parent_comment_id) {
            $parentComment = Comment::find($request->parent_comment_id);
            if (!$parentComment->canReply()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maximum reply depth reached'
                ], 422);
            }
            $depth = $parentComment->depth + 1;
        }

        $comment = Comment::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'parent_comment_id' => $request->parent_comment_id,
            'depth' => $depth,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reply added successfully',
            'comment' => [
                'id' => $comment->id,
                'content' => $comment->content,
                'depth' => $comment->depth,
                'created_at' => $comment->created_at->diffForHumans()
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
