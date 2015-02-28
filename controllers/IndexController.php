<?php
/**
 * Created by PhpStorm.
 * User: ivphpan
 * Date: 28.02.15
 * Time: 18:24
 */

namespace app\controllers;
use yii\web\Controller;


class IndexController extends Controller{

    public function actionIndex(){
        phpinfo();
    }

} 