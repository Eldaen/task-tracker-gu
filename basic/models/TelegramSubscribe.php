<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telegram_subscribe".
 *
 * @property integer $id_telegram_subscription
 * @property integer $id_user
 * @property integer $id_telegram_user
 * @property integer $id_event
 */
class TelegramSubscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'telegram_subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_telegram_user', 'id_event'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_telegram_subscription' => 'Id Telegram Subscription',
            'id_user' => 'Id User',
            'id_telegram_user' => 'Id Telegram User',
            'id_event' => 'Id Event',
        ];
    }
}
