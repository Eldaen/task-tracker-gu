<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property integer $creator_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deadline
 * @property integer $completion_time
 * @property integer $team_id
 ** @property integer $status
 *
 * @property Users $creator
 * @property Teams $team
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tasks}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body', 'status', 'creator_id', 'deadline', 'team_id'], 'required'],
            [['body'], 'string'],
            [['creator_id', 'status', 'created_at', 'updated_at', 'team_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['creator_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teams::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'creator_id' => 'Creator ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deadline' => 'Deadline',
            'completion_time' => 'Completion Time',
            'team_id' => 'Team',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(Users::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Teams::className(), ['id' => 'team_id']);
    }


    public function beforeSave($insert)
    {
        //TODO: проверить, что это работает корректно
        //Преобразуем input type="date" в юникс
        $array = explode('-', $this->deadline);
        $this->deadline = mktime(0, 0, 0, $array[1], $array[2], $array[0]);
        return parent::beforeSave($insert);
    }


}
