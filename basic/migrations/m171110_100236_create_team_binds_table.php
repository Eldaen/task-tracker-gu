<?php

use yii\db\Migration;

/**
 * Handles the creation of table `team_binds`.
 */
class m171110_100236_create_team_binds_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%team_binds}}', [
            'team_id' => $this->integer(),
            'user_id' => $this->integer()
        ], $tableOptions);
        //составной primary key
        $this->addPrimaryKey('team_binds_pk', '{{%team_binds}}', ['team_id', 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('team_binds');
    }
}
