<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telegram_message".
 *
 * @property integer $id_telegram_message
 * @property integer $id_telegram_user
 * @property integer $is_proceeded
 * @property string $timestamp_proceed
 */
class TelegramMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'telegram_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_telegram_user', 'is_proceeded'], 'integer'],
            [['timestamp_proceed'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_telegram_message' => 'Id Telegram Message',
            'id_telegram_user' => 'Id Telegram User',
            'is_proceeded' => 'Is Proceeded',
            'timestamp_proceed' => 'Timestamp Proceed',
        ];
    }
}
