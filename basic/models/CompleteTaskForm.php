<?php
namespace app\models;

use yii\base\Model;

/**
 * Login form
 */
class CompleteTaskForm extends Model
{
    public $completion_message;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['completion_message'], 'string'],
            [['completion_message'],'filter','filter'=>'\yii\helpers\HtmlPurifier::process']
        ];
    }

    public function attributeLabels()
    {
        return
        [
            'completion_message' => 'Сообщение'
        ];
    }


    public function save($id)
    {
        $task = Tasks::find()->where(['id' => $id])->one();
        $task->completion_message = $this->completion_message;
        $task->completion_time = time();
        $task->status = 0;
        return $task->save() ? true : false;
        //return   && $task->status = 0 && $task->save() ? true : false;
    }
}
