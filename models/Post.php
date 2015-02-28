<?php

namespace app\models;

use Yii;
use app\components\Translit;
use app\models\PostCategory;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $content
 * @property string $image
 * @property string $metaKeywords
 * @property string $metaDescription
 * @property string $metaTitle
 * @property integer $views
 * @property integer $position
 * @property integer $categoryId
 * @property PostCategory $category
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['content', 'metaDescription'], 'string'],
            [['views', 'position', 'categoryId'], 'integer'],
            [['title', 'url', 'image', 'metaKeywords', 'metaTitle'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'url' => Yii::t('app', 'Адрес'),
            'content' => Yii::t('app', 'Содержание'),
            'image' => Yii::t('app', 'Иконка'),
            'metaKeywords' => Yii::t('app', 'Мета - ключевые слова'),
            'metaDescription' => Yii::t('app', 'Мета - содержание'),
            'metaTitle' => Yii::t('app', 'Мета - заголовок'),
            'views' => Yii::t('app', 'Просмотры'),
            'position' => Yii::t('app', 'Позиция'),
            'categoryId' => Yii::t('app', 'Категория'),
        ];
    }

    public function beforeSave($insert=true)
    {
        if(empty($this->url))
            $this->url = Translit::str2url($this->title);
        return parent::beforeSave(true);
    }

    public function getUrl()
    {
        return '/'.$this->category->url.'/'.$this->url;
    }

    public function getCategory()
    {
        return $this->hasOne(PostCategory::className(),['id'=>'categoryId']);
    }
}
