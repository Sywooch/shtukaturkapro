<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Settings */

?>
<br/>
<div class="site-settings">

    <?= $form->field($model, 'siteName') ?>
    <?= $form->field($model, 'mainKeywords')->textarea() ?>
    <?= $form->field($model, 'mainDescription')->textarea() ?>
    <?= $form->field($model, 'facebookLink') ?>
    <?= $form->field($model, 'vkLink') ?>
    <?= $form->field($model, 'googlePlusLink') ?>
    <?= $form->field($model, 'categoryImageShow')->checkbox() ?>

</div>
