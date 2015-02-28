<?php
/**
 * Created by PhpStorm.
 * User: ivphpan
 * Date: 28.02.15
 * Time: 14:11
 */

namespace app\models;

use Yii;
use yii\base\Model;

class Settings extends Model{

    public $facebookLink;
    public $vkLink;
    public $googlePlusLink;
    public $siteName;
    public $mainKeywords;
    public $mainDescription;
    public $categoryImageShow;
    public $adminName;
    public $adminPassword;

    public function rules()
    {
        return [
            [['facebookLink','vkLink','googlePlusLink','siteName','adminName'],'required'],
            [['facebookLink','vkLink','googlePlusLink'],'url'],
            [['mainKeywords','mainDescription','categoryImageShow','adminPassword'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'siteName'=>'Название сайта',
            'mainKeywords'=>'Ключевые слова на главной',
            'mainDescription'=>'Описание на главной',
            'facebookLink'=>'Ссылка на группу в Facebook',
            'vkLink'=>'Ссылка на группу в VK',
            'googlePlusLink'=>'Ссылка на группу в GooglePlus',
            'categoryImageShow'=>'Показывать иконки в категориях',
            'adminName'=>'Логин админа',
            'adminPassword'=>'Пароль админа',
        ];
    }

    public function init()
    {
        $this->siteName = Yii::$app->settings->get('siteName');
        $this->mainKeywords = Yii::$app->settings->get('mainKeywords');
        $this->mainDescription = Yii::$app->settings->get('mainDescription');
        $this->facebookLink = Yii::$app->settings->get('facebookLink');
        $this->vkLink = Yii::$app->settings->get('vkLink');
        $this->googlePlusLink = Yii::$app->settings->get('googlePlusLink');
        $this->categoryImageShow = Yii::$app->settings->get('categoryImageShow');
        $this->adminName = Yii::$app->settings->get('adminName');
    }

    public function save()
    {
        foreach($this->attributes as $key=>$value)
        {
            if($key == 'adminPassword'){

                if(empty($value))
                    continue;

                $value = Yii::$app->security->generatePasswordHash($value);
            }
            Yii::$app->settings->set($key,$value);
        }
    }

} 