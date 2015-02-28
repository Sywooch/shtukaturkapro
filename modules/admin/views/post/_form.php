<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PostCategory;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $model app\models\PostCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'categoryId')->dropDownList(PostCategory::getDropdown()) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'metaKeywords')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'metaDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metaTitle')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'position')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
