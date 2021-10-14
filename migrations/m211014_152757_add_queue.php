<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m211014_152757_add_queue
 */
class m211014_152757_add_queue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('queue', [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_STRING . ' NOT NULL',
            'params' => Schema::TYPE_TEXT,
            'status' => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211014_152757_add_queue cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211014_152757_add_queue cannot be reverted.\n";

        return false;
    }
    */
}
