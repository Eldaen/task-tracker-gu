<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telegramm_subscribe`.
 */
class m171123_184327_create_telegramm_subscribe_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('telegram_subscribe', [
            'id_telegram_subscription' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_telegram_user' => $this->integer(),
            'id_event' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('telegram_subscribe');
    }
}
