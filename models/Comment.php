<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{

    public static function tableName()
    {
        return "comment";
    }


    public function getTree($array)
    {
        $tempArray = [];
        foreach ($array as $k => $item) {
            $tempArray[$k] = [
                'id'     => $item->id,
                'author' => $item->author,
                'mail'   => $item->mail,
                'text'   => $item->text,
                'article_id' => $item->article_id,
                'parent_id' => $item->parent_id
            ];
        }

        $new = array();
        foreach ($tempArray as $a){
            $new[$a['parent_id']][] = $a;
        }

        $tree = self::createTree($new, array($tempArray[0]));

        return $tree;
    }

    public function createTree(&$list, $parent)
    {
        $tree = array();
        foreach ($parent as $k=>$l){
            if(isset($list[$l['id']])){
                $l['children'] = self::createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        }
        return $tree;
    }



}