<?php

use yii\db\Migration;

/**
 * Class m171110_112016_add_basic_data
 */
class m171110_112016_add_basic_data extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('{{%teams}}',
            [
                'name' => 'Первая команда',
                'description' => 'Ребята, которые рабаотают над Frontend-ом, очень стараются.'
            ]);
        $this->insert('{{%teams}}',
        [
            'name' => 'Вторая команда',
            'description' => 'Тут дела Backend-ные, всё важно и по взрослому.'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('{{%teams}}', ['name' => 'Первая команда']);
        $this->delete('{{%teams}}', ['name' => 'Вторая команда']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171110_112016_add_basic_data cannot be reverted.\n";

        return false;
    }
    */
}
