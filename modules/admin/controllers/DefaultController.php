<?php

namespace app\modules\admin\controllers;
use Yii;

class DefaultController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSettings()
    {
        $this->layout = 'admin';
        $model = new \app\models\Settings();
        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            Yii::$app->session->setFlash('success','Настройки успешно сохранены');
            $model->save();
            $this->refresh();
        }
        return $this->render('settings',['model'=>$model]);
    }
}
