<?php
/**
 * User: qx
 * Date: 2020/12/3
 * Time: 16:56
 *
 * -- 高山仰止,景行行止.虽不能至,心向往之.
 */

namespace App\Http\Controllers;

use App\Events\FooEvent;
use App\Jobs\BarJob;
use App\Models\Post;

class DemoController extends Controller
{
    /**
     * @return array
     */
    public function index()
    {
        return $this->returnData(200, 'success');
    }

    /**
     * @return array
     */
    public function eventDemo():array
    {
        $posts = Post::createPost('eventDemo', 'eventDemo', time(), 'eventDemo');
        event(new FooEvent($posts));
        return $this->returnData(200, 'success');
    }

    /**
     * @return array
     */
    public function jobDemo():array
    {
        $posts = Post::createPost('jobDemo', 'jobDemo', time(), 'jobDemo');
        dispatch(new BarJob($posts));
        return $this->returnData(200, 'success');
    }
}
