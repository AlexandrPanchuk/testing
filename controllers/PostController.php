<?php

namespace app\controllers;
use app\models\Comment;
use app\models\CommentForm;
use app\models\Post;


class PostController extends BaseController
{
    public function actionIndex()
    {
        $objPosts = Post::find()->limit(3)->all();
        return $this->render('index', compact('objPosts'));
    }

    public function actionView()
    {
        $idPost = \Yii::$app->request->get('id');
        $post = Post::findOne(['id' => $idPost]);
        $comments = $post->comments;

        $modelComment = new Comment();
        $treeComment = $modelComment->getTree($comments);

        $modelComment = new CommentForm();
        return $this->render('view', compact('post', 'comments', 'modelComment', 'treeComment'));
    }

    public function actionComment($id, $parent_id = 0)
    {
        $commentModel = new CommentForm();

        // button -> method post
        if (\Yii::$app->request->isPost) {
            $commentModel->load(\Yii::$app->request->post());
            if ($commentModel->saveComment($id, $parent_id)) {
                return $this->redirect(['post/view', 'id' => $id]);
            }
        }

        return false; // else need Yii exception
    }

}