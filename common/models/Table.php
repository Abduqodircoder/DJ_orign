<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dj_table}}".
 *
 * @property int $id
 * @property int $group_id
 * @property int $weekday
 * @property int $pair
 * @property int $stype_id
 * @property int $subject_id
 * @property int $teacher_id
 * @property int $teacher2_id
 * @property int $audit_id
 * @property int $audit2_id
 * @property int $flgonline
 * @property int $faculty_id
 * @property string $settime
 * @property string $deltime
 * @property int $semestr
 * @property int $user_id Foydalanuvchi
 * @property string $cdate Kiritilgan sana
 * @property string $udate So'ngi o'zgarish
 * @property int $sdesignate
 * @property int $designate
 *
 * @property DjGroup $group
 * @property DjStype $stype
 * @property DjSubject $subject
 * @property DjTeacher $teacher
 * @property DjAudit $audit
 * @property DjFaculty $faculty
 * @property DjUser $user
 */
class Table extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dj_table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'weekday', 'pair', 'stype_id', 'subject_id', 'teacher_id', 'teacher2_id', 'audit_id', 'audit2_id', 'flgonline', 'faculty_id', 'semestr', 'user_id', 'sdesignate', 'designate'], 'integer'],
            [['settime', 'deltime', 'cdate', 'udate'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['stype_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjStype::className(), 'targetAttribute' => ['stype_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjSubject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjTeacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
            [['audit_id'], 'exist', 'skipOnError' => true, 'targetClass' => DjAudit::className(), 'targetAttribute' => ['audit_id' => 'id']],
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
            'group_id' => Yii::t('app', 'Group ID'),
            'weekday' => Yii::t('app', 'Weekday'),
            'pair' => Yii::t('app', 'Pair'),
            'stype_id' => Yii::t('app', 'Stype ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'teacher2_id' => Yii::t('app', 'Teacher2 ID'),
            'audit_id' => Yii::t('app', 'Audit ID'),
            'audit2_id' => Yii::t('app', 'Audit2 ID'),
            'flgonline' => Yii::t('app', 'Flgonline'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'settime' => Yii::t('app', 'Settime'),
            'deltime' => Yii::t('app', 'Deltime'),
            'semestr' => Yii::t('app', 'Semestr'),
            'user_id' => Yii::t('app', 'User ID'),
            'cdate' => Yii::t('app', 'Cdate'),
            'udate' => Yii::t('app', 'Udate'),
            'sdesignate' => Yii::t('app', 'Sdesignate'),
            'designate' => Yii::t('app', 'Designate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(DjGroup::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStype()
    {
        return $this->hasOne(DjStype::className(), ['id' => 'stype_id']);
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
    public function getTeacher()
    {
        return $this->hasOne(DjTeacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAudit()
    {
        return $this->hasOne(DjAudit::className(), ['id' => 'audit_id']);
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
}
