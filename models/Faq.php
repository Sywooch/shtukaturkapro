<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property string $userName
 * @property string $userEmail
 * @property string $question
 * @property string $answer
 * @property string $dateCreate
 * @property string $dateAnswer
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer'], 'string'],
            [['dateCreate', 'dateAnswer'], 'safe'],
            [['userName'], 'string', 'max' => 64],
            [['userEmail'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userName' => Yii::t('app', 'Nick'),
            'userEmail' => Yii::t('app', 'Email'),
            'question' => Yii::t('app', 'Вопрос'),
            'answer' => Yii::t('app', 'Ответ'),
            'dateCreate' => Yii::t('app', 'Дата вопроса'),
            'dateAnswer' => Yii::t('app', 'Дата ответа'),
        ];
    }
}
