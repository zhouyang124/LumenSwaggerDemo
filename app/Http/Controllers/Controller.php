<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //

    /**
     * @param $code
     * @param $data
     * @param $message
     *
     * @return array
     */
    public function returnData($code, $message = '', $data = []): array
    {
        return compact('code', 'message', 'data');
    }
}
