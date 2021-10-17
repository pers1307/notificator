<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m211016_105201_add_templates
 */
class m211016_105201_add_templates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('EmailTemplate', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'templateText' => Schema::TYPE_TEXT
        ]);

        $this->createTable('SMSTemplate', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'templateText' => Schema::TYPE_TEXT
        ]);

        $this->createTable('PushTemplate', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'templateText' => Schema::TYPE_TEXT
        ]);

        $this->insert('EmailTemplate', [
            'id' => 1,
            'name' => "welcome",
            'templateText' => "Привет! Добро пожаловать в наш сервис. {text}"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /**
         * Не будем тратить время)
         */

        echo "m211016_105201_add_templates cannot be reverted.\n";

        return false;
    }
}
