<?php


namespace App\Models;


use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 表名
    protected $table = 'post';

    // 批量操作时 敏感的字段
    protected $guarded = [];

    // 是否启用自动更新时间字段
    public $timestamps = true;

    // 时间字段格式
    protected $dateFormat = 'U';

    // 重写时间字段名称
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';


    /**
     * @param $remark
     * @return bool
     */
    public function updateRemark($remark):bool
    {
        $this->remark = $remark;
        return $this->save();
    }

    /**
     * @param $title
     * @param $author
     * @param $content
     * @param $remark
     * @return Post
     */
    public static function createPost($title, $author, $content, $remark):Post
    {
        $param = compact('title', 'author', 'content', 'remark');
        return self::create($param);
    }
}
