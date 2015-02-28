<?php

use yii\bootstrap\Tabs;
use yii\bootstrap\Alert;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this \yii\base\View
 * @var $model \app\models\Settings
 */
?>

<h1>Настройки сайта</h1>

<?php

if(Yii::$app->session->hasFlash('success'))
{
    echo Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'body' => Yii::$app->session->getFlash('success'),
    ]);
}

?>


<?php

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-3 control-label'],
    ],
]);

echo Tabs::widget([
    'items' => [
        [
            'label' => 'Основные',
            'content' => $this->render('settings/_main',['model'=>$model,'form'=>$form]),
            'active' => true
        ],
        [
            'label' => 'Админка',
            'content' => $this->render('settings/_admin',['model'=>$model,'form'=>$form]),
            'active' => false,
        ],
    ],
]);
?>
<div class="form-group">
        <div class="col-lg-offset-11 col-lg-11">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>
</div>

<?php ActiveForm::end();?>