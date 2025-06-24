<?php

// database/seeders/PostsTableSeeder.php
namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $post = Post::create([
            'title' => 'Sample Post',
            'content' => 'This is a sample post content.'
        ]);

        $comment1 = Comment::create([
            'content' => 'First level comment',
            'post_id' => $post->id,
            'depth' => 0
        ]);

        $comment2 = Comment::create([
            'content' => 'Reply to first comment',
            'post_id' => $post->id,
            'parent_comment_id' => $comment1->id,
            'depth' => 1
        ]);

        $comment3 = Comment::create([
            'content' => 'Reply to second comment',
            'post_id' => $post->id,
            'parent_comment_id' => $comment2->id,
            'depth' => 2
        ]);

        // This one should not be allowed in the UI (depth = 3)
        Comment::create([
            'content' => 'Reply to third comment (max depth)',
            'post_id' => $post->id,
            'parent_comment_id' => $comment3->id,
            'depth' => 3
        ]);
    }
}