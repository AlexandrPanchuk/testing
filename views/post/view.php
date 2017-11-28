<?php
/**
 * Created by PhpStorm.
 * User: alexandr
 * Date: 28.11.17
 * Time: 15:53
 */
?>

<h1><?= $post->title ?></h1>
<?= $post->text ?>

<hr>


<?php if (!empty($treeComment)) : ?>
    <?php foreach ($treeComment as $k => $comment) : ?>

        <!--   HTML view tree need recursion -->

    <?php endforeach; ?>
<?php endif; ?>


<?php if (!empty($comments)) : ?>
    <h3>Все комментарии</h3>
    <?php foreach ($comments as $comment) : ?>

        <div class="comment">
            <p><?=$comment->author?></p>
            <p><?=$comment->mail?></p>
            <p><?=$comment->text?></p>
        </div>


        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => ['post/comment', 'id' => $post->id, 'parent_id' => $comment->id],
            'options' => ['role' => 'form']]); ?>

        <?= $form->field($modelComment, 'author')->textarea()?>
        <?= $form->field($modelComment, 'mail')->textarea()?>
        <?= $form->field($modelComment, 'comment')->textarea()?>
        <button type="submit"> Ответить </button>
        <?php \yii\widgets\ActiveForm::end(); ?>

        <hr>

    <?php endforeach; ?>
<?php endif; ?>
<hr>

<?php $form = \yii\widgets\ActiveForm::begin([
    'action' => ['post/comment', 'id' => $post->id],
    'options' => ['role' => 'form']]); ?>
<h2>Оставить комментарий</h2>
<?= $form->field($modelComment, 'author')->textarea()?>
<?= $form->field($modelComment, 'mail')->textarea()?>
<?= $form->field($modelComment, 'comment')->textarea()?>
<button type="submit"> Оставить комментарий </button>
<?php \yii\widgets\ActiveForm::end(); ?>



