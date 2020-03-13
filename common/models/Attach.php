<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_attach}}".
 *
 * @property int $id
 * @property int $faculty_id Fakultet
 * @property int $techaer_id O'qituvchi
 * @property int $subject_id Fan
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 *
 * @property DjFaculty $faculty
 * @property DjTeacher $techaer
 * @property DjSubject $subject
 * @property DjUser $user
 */
class Attach extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_attach}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faculty_id', 'techaer_id', 'subject_id', 'user_id'], 'integer'],
            [['cdate', 'udate'], 'safe'],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjFaculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['techaer_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjTeacher::className(), 'targetAttribute' => ['techaer_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjSubject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjUser::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'techaer_id' => Yii::t('app', 'Techaer ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'cdate' => Yii::t('app', 'Cdate'),
            'udate' => Yii::t('app', 'Udate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(DjFaculty::className(), ['id' => 'faculty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechaer()
    {
        return $this->hasOne(DjTeacher::className(), ['id' => 'techaer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(DjSubject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(DjUser::className(), ['id' => 'user_id']);
    }
}
