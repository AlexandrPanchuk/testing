<?php

namespace app\models;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{

    public static function tableName()
    {
        return "post";
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }



}