<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $guarded = [];

    public static function add($tags, $id, $model_type)
    {
        $tags = explode(',', $tags);
        if (empty($tags)) {
            return false;
        }
        $arr = [];
        $rel = [];
        foreach ($tags as $k => $v) {
            if (!$v) {
                continue;//跳过为空的
            }
            $r = self::updateOrCreate(
                ['name' => $v],
                [
                    'name' => ($v)

                ]);
            $arr[] = $r['id'];
            $rel[] = [
                'tag_id' => $r['id'],
                'model_type' => $model_type,
                'model_id' => $id
            ];
        }
        //进行关联附加
        if (!empty($rel)) {
            //先移除再附加
            TagRel::where(['model_type' => $model_type, 'model_id' => $id])->delete();
            TagRel::insert($rel);
        }

        return $arr;

    }
}
