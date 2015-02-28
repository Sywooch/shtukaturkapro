<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\components\Translit;
use yii\web\UploadedFile;

/**
 * This is the model class for table "postCategory".
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
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'postCategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['image'],'file','extensions'=>['jpg','png','gif']],
            [['content', 'metaDescription'], 'string'],
            [['views', 'position'], 'integer'],
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
        ];
    }

    public static function getDropdown()
    {
        return ArrayHelper::map(PostCategory::find()->all(),'id','title');
    }

    public function beforeSave($insert)
    {
        if(empty($this->url))
            $this->url = Translit::str2url($this->title);

        $file = UploadedFile::getInstance($this,'image');
        if($file)
        {
            $filename = Translit::str2url($this->title).'.'.$file->extension;
            if($file->saveAs('upload/post-category/'.$filename))
            {
                $this->image = $filename;
            }
        }

        return parent::beforeSave(true);
    }
}
