<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telegramm_offset`.
 */
class m171123_184337_create_telegramm_offset_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('telegram_offset', [
            'id_offset' => $this->primaryKey(),
            'timestamp_offset' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('telegram_offset');
    }
}
