<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_subject}}".
 *
 * @property int $id
 * @property string $name
 * @property int $faculty_id Fakultet
 * @property int $emode_id Таълим шакли
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 *
 * @property DjAttach[] $djAttaches
 * @property DjFaculty $faculty
 * @property DjEmode $emode
 * @property DjUser $user
 * @property DjTable[] $djTables
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_subject}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faculty_id', 'emode_id', 'user_id'], 'integer'],
            [['cdate', 'udate'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjFaculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['emode_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjEmode::className(), 'targetAttribute' => ['emode_id' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'emode_id' => Yii::t('app', 'Emode ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'cdate' => Yii::t('app', 'Cdate'),
            'udate' => Yii::t('app', 'Udate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjAttaches()
    {
        return $this->hasMany(DjAttach::className(), ['subject_id' => 'id']);
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
    public function getEmode()
    {
        return $this->hasOne(DjEmode::className(), ['id' => 'emode_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(DjUser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjTables()
    {
        return $this->hasMany(DjTable::className(), ['subject_id' => 'id']);
    }
}
