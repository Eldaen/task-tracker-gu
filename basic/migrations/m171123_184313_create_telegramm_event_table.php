<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telegramm_event`.
 */
class m171123_184313_create_telegramm_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('telegram_event', [
            'id_telegram_event' => $this->primaryKey(),
            'telegram_event_name' => $this->string(50),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('telegram_event');
    }
}
