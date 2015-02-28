<?php
/**
 * Created by PhpStorm.
 * User: ivphpan
 * Date: 28.02.15
 * Time: 15:06
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class AdminController extends Controller{

    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update','index','delete'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

} 