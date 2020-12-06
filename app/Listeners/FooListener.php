<?php

namespace App\Listeners;

use App\Events\ExampleEvent;
use App\Events\FooEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FooListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\FooEvent  $event
     * @return void
     */
    public function handle(FooEvent $event)
    {
        //
        $posts = $event->getPost();
        $posts->updateRemark('fooListener');
    }
}
