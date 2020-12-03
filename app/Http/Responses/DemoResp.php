<?php
/**
 * Created by PhpStorm.
 * User: qx
 * Date: 2020/9/29
 * Time: 11:34
 *
 *    .--,       .--,
 *   ( (  \.---./  ) )
 *    '.__/o   o\__.'
 *       {=  ^  =}
 *        >  -  <
 *       /       \
 *      //       \\
 *     //|   .   |\\
 *     "'\       /'"_.-~^`'-.
 *        \  _  /--'         `
 *      ___)( )(___
 *     (((__) (__)))
 *                       -- 高山仰止,景行行止.虽不能至,心向往之.
 *
 */

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * @Schema(
 *     title="demo响应内容",
 *     description="demo响应内容描述"
 * )
 *
 * @package App\Http\Responses
 */
class DemoResp
{
    /**
     * @Property(
     *     type="integer",
     *     description="ID"
     * )
     *
     * @var int
     */
    public $id = 0;

    /**
     * @Property(
     *     type="string",
     *     description="用户名"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @Property(
     *     type="integer",
     *     description="年龄"
     * )
     *
     * @var integer
     */
    public $age;

    /**
     * @Property(
     *     type="string",
     *     description="性别"
     * )
     *
     * @var string
     */
    public $gender;

    /**
     * @Property(
     *     type="array",
     *     @Items(ref="#/components/schemas/DemoAdditionalProperty")
     * )
     *
     * @var array
     */
    public $properties = [];

}
