<?php

namespace App\Http\Controllers;

use App\Http\Responses\DemoAdditionalProperty;
use App\Http\Responses\DemoResp;
use Illuminate\Http\Request;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Post;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

class ExampleController extends Controller
{

    /**
     * @Post(
     *     path="/sw/demo",
     *     tags={"演示"},
     *     summary="演示API",
     *     @RequestBody(
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 required={"name", "age"},
     *                 @Property(property="name", type="string", description="姓名"),
     *                 @Property(property="age", type="integer", description="年龄"),
     *                 @Property(property="gender", type="string", description="性别")
     *             )
     *         )
     *     ),
     *     @Response(
     *         response="200",
     *         description="正常操作响应",
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 allOf={
     *                     @Schema(ref="#/components/schemas/ApiResponse"),
     *                     @Schema(
     *                         type="object",
     *                         @Property(property="data", ref="#/components/schemas/DemoResp")
     *                     )
     *                 }
     *             )
     *         )
     *     )
     * )
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function demo(Request $request)
    {
        // TODO 业务逻辑

        $resp         = new DemoResp();
        $resp->name   = $request->input('name');
        $resp->id     = 123;
        $resp->age    = $request->input('age');
        $resp->gender = $request->input('gender');

        $prop1        = new DemoAdditionalProperty();
        $prop1->key   = "foo";
        $prop1->value = "bar";

        $prop2        = new DemoAdditionalProperty();
        $prop2->key   = "foo2";
        $prop2->value = "bar2";

        $resp->properties = [$prop1, $prop2];
        // $resp             = $this->object_array($resp);
        // return $resp;
        return $this->returnData(200,  'success', $resp);
    }

    private function object_array($array)
    {
        if (is_object($array)) {
            $array = (array)$array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = $this->object_array($value);
            }
        }

        return $array;
    }
}
