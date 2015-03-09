<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Post Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Post category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'url:url',
            [
                'attribute'=>'parentId',
                'value'=>function($model){
                    return $model->ParentTitle;
                },
                'filter'=>\app\models\PostCategory::getDropdown()
            ],
            // 'metaKeywords',
            // 'metaDescription:ntext',
            // 'metaTitle',
            // 'views',
            'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
