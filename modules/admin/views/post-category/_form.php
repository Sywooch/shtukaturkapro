<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\CKEditor;
use app\models\PostCategory;

/* @var $this yii\web\View */
/* @var $model app\models\PostCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'parentId')->dropDownList(PostCategory::getDropdown($model->id),['prompt'=>'---'])?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

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
