<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\components\Translit;
use yii\web\UploadedFile;
use app\models\Post;

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
 * @property integer $parentId
 * @property Post[] $posts
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
            [['title'], 'required'],
            ['image', 'file', 'extensions' => 'jpg,png,gif', 'skipOnEmpty' => true],
            [['content', 'metaDescription'], 'string'],
            [['views', 'position', 'parentId'], 'integer'],
            [['title', 'url', 'metaKeywords', 'metaTitle'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parentId' => Yii::t('app', 'Родительская категория'),
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

    public static function getDropdown($notId = null)
    {
        $items = PostCategory::find();

        if ($notId) {
            $items->where('id!=' . $notId);
        }

        $items = $items->all();


        return ArrayHelper::map($items, 'id', 'title');
    }

    public function beforeSave($insert)
    {
        if (empty($this->url))
            $this->url = Translit::str2url($this->title);

        return parent::beforeSave(true);
    }

    public function getParentTitle()
    {
        $parent = $this->parent;
        if ($parent)
            return $parent->title;
        return 'null';
    }

    public function getParent()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'parentId']);
    }

    public static function getPrimaryNavData()
    {
        return PostCategory::find()->select(['title', 'url', 'id'])->where('parentId=1')->orderBy('position')->all();
    }

    public static function getSecondNavData()
    {
        return PostCategory::find()->select(['title', 'url', 'id'])->where('parentId is null and id<>1')->orderBy('position')->all();
    }

    public function getPosts()
    {
        $items = [];
        for($i=0;$i<5;$i++)
        {
            $items[] = (object)['title'=>'Раствор для штукатурки','url'=>'#'];
        }
        return $items;

        $items = $this->hasMany(Post::className(),['id','categoryId']);
        return $items;
    }
}
