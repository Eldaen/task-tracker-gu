<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Login form
 */
class CompleteTaskForm extends ActiveRecord
{
    public $message;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['message'],'filter','filter'=>'\yii\helpers\HtmlPurifier::process']
        ];
    }
}
