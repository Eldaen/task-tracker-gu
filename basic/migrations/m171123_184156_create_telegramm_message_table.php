<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telegramm_message`.
 */
class m171123_184156_create_telegramm_message_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('telegram_message', [
            'id_telegram_message' => $this->primaryKey(),
            'id_telegram_user' => $this->integer(),
            'is_proceeded' => $this->boolean(),
            'timestamp_proceed' => $this->timestamp()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('telegramm_message');
    }
}
