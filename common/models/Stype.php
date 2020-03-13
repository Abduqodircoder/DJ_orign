<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_stype}}".
 *
 * @property int $id
 * @property string $name
 * @property string $cname
 * @property string $rname
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 *
 * @property DjUser $user
 * @property DjTable[] $djTables
 */
class Stype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_stype}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['cdate', 'udate'], 'safe'],
            [['name', 'cname', 'rname'], 'string', 'max' => 255],
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
            'rname' => Yii::t('app', 'Rname'),
            'user_id' => Yii::t('app', 'User ID'),
            'cdate' => Yii::t('app', 'Cdate'),
            'udate' => Yii::t('app', 'Udate'),
        ];
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
        return $this->hasMany(DjTable::className(), ['stype_id' => 'id']);
    }
}
