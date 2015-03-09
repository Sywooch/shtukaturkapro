<?php
/**
 * Created by PhpStorm.
 * User: ivphpan
 * Date: 09.03.15
 * Time: 12:07
 */

namespace app\controllers;
use yii\web\Controller;


class PostController extends Controller{

    public function actionCategory(){
        return $this->render('category');
    }
    public function actionView(){
        return $this->render('view');
    }
    public function actionSearch($q){}

} 