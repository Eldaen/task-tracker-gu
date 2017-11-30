<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\StringHelper;
use yii\helpers\Url;

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
 * @property integer $completion_message
 * @property integer $team_id
 * @property integer $status
 * @property integer $executor_id
 *
 * @property Users $creator
 * @property Teams $team
 */
class Tasks extends \yii\db\ActiveRecord
{
    const EVENT_TASK_CREATED = 'Добавлена новая задача';

    public function telegramInform($event)
    {
        $user = TelegramSubscribe::find()
            ->where(['id_user' => $event->sender->executor_id])
            ->one();

        if($user)
        {
            $message = 'У вас новая задача!' . PHP_EOL . PHP_EOL;
            $message .= 'Заголовок: ' . $event->sender->title . PHP_EOL;
            $message .= 'Описание: ' . StringHelper::truncate($event->sender->body, 100, '...') . PHP_EOL;
            $message .= 'Подробнее читайте по ссылке - ' . Url::toRoute(['@web/tasks/view', 'id' => $event->sender->id], true) . PHP_EOL;

            return Yii::$app->bot->sendMessage($user->id_telegram_user, $message);
        } else {
            return false;
        }
    }
    public function init(){

        $this->on(self::EVENT_TASK_CREATED, [$this, 'telegramInform']);

    }

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
            [['title', 'body', 'status', 'executor_id', 'creator_id', 'deadline', 'team_id'], 'required'],
            [['body', 'completion_message'], 'string'],
            [['creator_id', 'status', 'executor_id', 'created_at', 'updated_at', 'team_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['creator_id' => 'id']],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['executor_id' => 'id']],
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
            'executor_id' => 'Executor',
            'completion_time' => 'Completion Time',
            'completion_message' => 'Completion Message',
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
    public function getExecutor()
    {
        return $this->hasOne(Users::className(), ['id' => 'executor_id']);
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
        if(preg_match('/.*-.*/', $this->deadline))
        {
            $array = explode('-', $this->deadline);
            $this->deadline = mktime(0, 0, 0, $array[1], $array[2], $array[0]);
        }
        return parent::beforeSave($insert);
    }

    //Получает все таски, которые выполняет юзер с переданным id
    public function getActiveByUserId($user_id)
    {
        return static::find()->where(
            [
                'executor_id' => $user_id,
                'status' => 1
            ])->all();
    }

    //Получает таск с переданным id

    /**
     * @param integer $task_id the task ID
     */
    public function getById($task_id)
    {
        return static::find()->where(
            [
                'id' => $task_id
            ]
        )->one();
    }

    //Делаем чтобы отображались не ID, а названия
    public function fields()
    {
        $myFields = parent::fields();

        $myFields['creator_id'] = function()
        {
            return $this->creator->username;
        };
        $myFields['creator_name'] = $myFields['creator_id'];
        unset($myFields['creator_id']);

        $myFields['team_id'] = function()
        {
            return $this->team->name;
        };
        $myFields['team_name'] = $myFields['team_id'];
        unset($myFields['team_id']);

        return $myFields;
    }


}
