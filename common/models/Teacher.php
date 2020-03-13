<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_teacher}}".
 *
 * @property int $id
 * @property string $name_s
 * @property string $name
 * @property string $lname
 * @property string $fname
 * @property string $mname
 * @property string $lavozim
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 *
 * @property DjAttach[] $djAttaches
 * @property DjTable[] $djTables
 * @property DjUser $user
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_teacher}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['cdate', 'udate'], 'safe'],
            [['name_s', 'name', 'lname', 'fname', 'mname', 'lavozim'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'name_s' => Yii::t('app', 'Name S'),
            'name' => Yii::t('app', 'Name'),
            'lname' => Yii::t('app', 'Lname'),
            'fname' => Yii::t('app', 'Fname'),
            'mname' => Yii::t('app', 'Mname'),
            'lavozim' => Yii::t('app', 'Lavozim'),
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
        return $this->hasMany(DjAttach::className(), ['techaer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjTables()
    {
        return $this->hasMany(DjTable::className(), ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(DjUser::className(), ['id' => 'user_id']);
    }
}
