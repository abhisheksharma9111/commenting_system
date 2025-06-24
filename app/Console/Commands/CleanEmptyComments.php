<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;


class CleanEmptyComments extends Command
{

    protected $signature = 'comments:clean';
    protected $description = 'Delete comments with empty content';

    public function handle()
    {
        $deleted = Comment::where('content', '')->orWhereNull('content')->delete();
        $this->info("Deleted {$deleted} empty comments.");
        return 0;
    }
}
