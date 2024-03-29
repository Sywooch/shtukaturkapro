<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'url',
                'format'=>'html',
                'value'=>function($model){return Html::a($model->title,$model->getUrl(),['target'=>'_blank']);}
            ],
            'content:ntext',
            'image',
            // 'metaKeywords',
            // 'metaDescription:ntext',
            // 'metaTitle',
            // 'views',
            // 'position',
            // 'categoryId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
