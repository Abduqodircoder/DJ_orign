<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_group}}".
 *
 * @property int $id
 * @property string $name Guruh nomi
 * @property int $spec_id
 * @property int $course
 * @property int $faculty_id
 * @property int $flgonline
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 *
 * @property DjSpec $spec
 * @property DjFaculty $faculty
 * @property DjUser $user
 * @property DjTable[] $djTables
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_group}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['spec_id', 'course', 'faculty_id', 'flgonline', 'user_id'], 'integer'],
            [['cdate', 'udate'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['spec_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjSpec::className(), 'targetAttribute' => ['spec_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjFaculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
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
            'spec_id' => Yii::t('app', 'Spec ID'),
            'course' => Yii::t('app', 'Course'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'flgonline' => Yii::t('app', 'Flgonline'),
            'user_id' => Yii::t('app', 'User ID'),
            'cdate' => Yii::t('app', 'Cdate'),
            'udate' => Yii::t('app', 'Udate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpec()
    {
        return $this->hasOne(DjSpec::className(), ['id' => 'spec_id']);
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
    public function getUser()
    {
        return $this->hasOne(DjUser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjTables()
    {
        return $this->hasMany(DjTable::className(), ['group_id' => 'id']);
    }
}
