<?php

?>

<?php if (!empty($objPosts)) : ?>
    <?php foreach ($objPosts as $posts) : ?>
        <a href="<?=\yii\helpers\Url::to(['post/view', 'id' => $posts->id])?>"><h3><?= $posts->title ?></h3></a>
            <p>
                <?= $posts->short_desc ?>
            </p>
        <br>
    <?php endforeach; ?>
<?php endif; ?>

