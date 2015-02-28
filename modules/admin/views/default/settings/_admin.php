<?php

use app\models\Settings;

/* @var $model Settings */
/* @var $form yii\bootstrap\ActiveForm */

?>

<br/>
<div class="admin-settings">

    <?= $form->field($model, 'adminName') ?>
    <?= $form->field($model, 'adminPassword')->passwordInput() ?>

</div>