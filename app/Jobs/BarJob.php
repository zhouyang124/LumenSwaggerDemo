<?php

namespace App\Jobs;

use App\Models\Post;

class BarJob extends Job
{

    protected $posts;

    /**
     * Create a new job instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        //
        $this->posts = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->posts->remark = 'BarJob';
        $this->posts->save();
    }
}
