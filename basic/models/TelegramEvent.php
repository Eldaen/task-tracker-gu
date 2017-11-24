<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telegram_event".
 *
 * @property integer $id_telegram_event
 * @property string $telegram_event_name
 */
class TelegramEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'telegram_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telegram_event_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_telegram_event' => 'Id Telegram Event',
            'telegram_event_name' => 'Telegram Event Name',
        ];
    }
}
