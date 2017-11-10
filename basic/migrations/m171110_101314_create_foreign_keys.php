<?php

use yii\db\Migration;

/**
 * Class m171110_101314_create_foreign_keys
 */
class m171110_101314_create_foreign_keys extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_creator_id', '{{%tasks}}', 'creator_id', '{{%users}}', 'id' );
        $this->addForeignKey('fk_team_id', '{{%tasks}}', 'team_id', '{{%teams}}', 'id' );
        $this->addForeignKey('fk_team_bind_team_id', '{{%team_binds}}', 'team_id', '{{%teams}}', 'id' );
        $this->addForeignKey('fk_team_bind_user_id', '{{%team_binds}}', 'user_id', '{{%users}}', 'id' );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_creator_id', '{{%tasks}}');
        $this->dropForeignKey('fk_team_id', '{{%teams}}');
        $this->dropForeignKey('fk_team_bind_team_id', '{{%team_binds}}');
        $this->dropForeignKey('fk_team_bind_user_id', '{{%team_binds}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171110_101314_create_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
