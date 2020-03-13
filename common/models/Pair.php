<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_pair}}".
 *
 * @property int $id
 * @property int $pp
 * @property string $ii
 */
class Pair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_pair}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pp'], 'integer'],
            [['ii'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pp' => Yii::t('app', 'Pp'),
            'ii' => Yii::t('app', 'Ii'),
        ];
    }
}
