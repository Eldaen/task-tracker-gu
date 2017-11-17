<?php

use yii\db\Migration;

/**
 * Handles adding completion_message to table `tasks`.
 */
class m171117_184311_add_completion_message_column_to_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('tasks', 'completion_message', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('tasks', 'completion_message');
    }
}
