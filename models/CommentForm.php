<?php

namespace app\models;


use app\Components\Helper;
use ErrorException;
use Yii;
use yii\base\Model;

class CommentForm extends Model
{

    public $comment;
    public $author;
    public $mail;

    public $parent_id;

    public function rules()
    {
        return [
            [['comment', 'mail', 'author'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'author' => 'Автор',
            'comment' => 'Оставить комментарий'
        ];
    }

    public function saveComment($post_id, $parent_id = null)
    {
        $comment = new Comment();
        $comment->text = $this->comment;
        $comment->author = $this->author;
        $comment->mail = Helper::isValidEmail($this->mail) ? $this->mail : null; // нужно выбрасывать exception, потом отлавливать
        $comment->article_id = $post_id;
        $comment->parent_id = $parent_id ? $parent_id : 0;
        return $comment->save();
    }



}