<?php
/* @var $this app\widgets\post\CategoryNav */
/* @var $primaryItems app\models\PostCategory[] */
/* @var $secondaryItems app\models\PostCategory[] */
use yii\helpers\Html;

?>
<!-- main-categories-->
<div class="main-categories">
    <div class="main-categories-block main-categories-block--row">
        <nav><span class="main-categories-block__title main-categories-block__title--nolink">Виды штукатурки:</span>
            <?php foreach ($primaryItems as $item) echo Html::a($item->title, ['post/category', 'url' => $item->url], ['class' => 'main-categories-block__item']) ?>
        </nav>
    </div>

    <?php foreach ($secondaryItems as $item): ?>
        <div class="main-categories-block">
            <nav>
                <?=Html::a($item->title,['post/category','url'=>$item->url],['class'=>'main-categories-block__title'])?>
                <?php foreach($item->posts as $post) echo Html::a($post->title,['post/view','url'=>$post->url],['class'=>'main-categories-block__item'])?>
            </nav>
        </div>
    <?php endforeach; ?>
</div>
<!-- main-categories-->
