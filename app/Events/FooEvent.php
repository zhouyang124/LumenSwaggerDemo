<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Support\Facades\Log;

class FooEvent extends Event
{

    private $post;

    /**
     * Create a new event instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        //
        $this->post = $post;
    }

    public function getPost()
    {
        Log::notice('你好，请到我这里来!(FooEvent.getPost)');
        return $this->post;
    }

}
