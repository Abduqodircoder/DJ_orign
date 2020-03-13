<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_audit}}".
 *
 * @property int $id
 * @property string $number
 * @property int $ncount
 * @property int $block
 * @property int $faculty_id Fakultet
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 *
 * @property DjFaculty $faculty
 * @property DjUser $user
 * @property DjTable[] $djTables
 */
class Audit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_audit}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ncount', 'block', 'faculty_id', 'user_id'], 'integer'],
            [['cdate', 'udate'], 'safe'],
            [['number'], 'string', 'max' => 20],
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
            'number' => Yii::t('app', 'Number'),
            'ncount' => Yii::t('app', 'Ncount'),
            'block' => Yii::t('app', 'Block'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
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
    public function getUser()
    {
        return $this->hasOne(DjUser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDjTables()
    {
        return $this->hasMany(DjTable::className(), ['audit_id' => 'id']);
    }
}
