<?php

use yii\db\Migration;

/**
 * Handles adding executor_id to table `tasks`.
 */
class m171116_170157_add_executor_id_column_to_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('tasks', 'executor_id', $this->integer());
        $this->addForeignKey('fk_executor_id', '{{%tasks}}', 'executor_id', '{{%users}}', 'id' );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('tasks', 'executor_id');
        $this->dropForeignKey('fk_executor_id', '{{%tasks}}');
    }
}
