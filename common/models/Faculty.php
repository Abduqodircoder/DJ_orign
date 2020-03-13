<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_faculty}}".
 *
 * @property int $id
 * @property string $name Факультет номи
 * @property string $cname Факультет номи
 * @property string $general
 * @property int $uyili
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 *
 * @property DjAttach[] $djAttaches
 * @property DjAudit[] $djAudits
 * @property DjUser $user
 * @property DjGroup[] $djGroups
 * @property DjLimits[] $djLimits
 * @property DjSpec[] $djSpecs
 * @property DjSubject[] $djSubjects
 * @property DjTable[] $djTables
 * @property DjUser[] $djUsers
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_faculty}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uyili', 'user_id'], 'integer'],
            [['cdate', 'udate'], 'safe'],
            [['name', 'general'], 'string', 'max' => 255],
            [['cname'], 'string', 'max' => 1023],
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
            'cname' => Yii::t('app', 'Cname'),
            'general' => Yii::t('app', 'General'),
            'uyili' => Yii::t('app', 'Uyili'),
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
        return $this->hasMany(DjAttach::className(), ['faculty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjAudits()
    {
        return $this->hasMany(DjAudit::className(), ['faculty_id' => 'id']);
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
    public function getDjGroups()
    {
        return $this->hasMany(DjGroup::className(), ['faculty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjLimits()
    {
        return $this->hasMany(DjLimits::className(), ['faculty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjSpecs()
    {
        return $this->hasMany(DjSpec::className(), ['faculty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjSubjects()
    {
        return $this->hasMany(DjSubject::className(), ['faculty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjTables()
    {
        return $this->hasMany(DjTable::className(), ['faculty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjUsers()
    {
        return $this->hasMany(DjUser::className(), ['faculty_id' => 'id']);
    }
}
