<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m211016_101654_add_user_group
 */
class m211016_101654_add_user_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'phone' => Schema::TYPE_TEXT,
            'email' => Schema::TYPE_TEXT,
        ]);

        $this->createTable('userGroup', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

        $this->createTable('userToUserGroup', [
            'id' => Schema::TYPE_PK,
            'userId' => Schema::TYPE_INTEGER,
            'userGroupId' => Schema::TYPE_INTEGER,
        ]);

        $this->addForeignKey(
            "fk-userToUserGroup-user",
            "userToUserGroup",
            "userId",
            "user",
            "id",
            "CASCADE");

        $this->addForeignKey(
            "fk-userToUserGroup-userGroup",
            "userToUserGroup",
            "userGroupId",
            "userGroup",
            "id",
            "CASCADE");

        $this->insert('user', [
            'id' => 1,
            'name' => 'Юрий',
            'phone' => '+79126666044',
            'email' => 'skulines@mail.ru',
        ]);
        $this->insert('user', [
            'id' => 2,
            'name' => 'Нет телефона',
            'phone' => '',
            'email' => 'skulines@mail.ru',
        ]);
        $this->insert('user', [
            'id' => 3,
            'name' => 'Нет email',
            'phone' => '+79126666044',
            'email' => '',
        ]);
        $this->insert('user', [
            'id' => 4,
            'name' => 'Нет контактов',
            'phone' => '',
            'email' => '',
        ]);
        // пасхалка
        $this->insert('user', [
            'id' => 5,
            'name' => 'Ваня Оловянников',
            'phone' => '+79127894381',
            'email' => 'i.oloviannikov@corp.ru',
        ]);

        $this->insert('userGroup', [
            'id' => 1,
            'name' => 'Все пользователи'
        ]);
        $this->insert('userGroup', [
            'id' => 2,
            'name' => 'Випы'
        ]);

        $this->insert('userToUserGroup', [
            'id' => 1,
            'userId' => 1,
            'userGroupId' => 1
        ]);
        $this->insert('userToUserGroup', [
            'id' => 2,
            'userId' => 2,
            'userGroupId' => 1
        ]);
        $this->insert('userToUserGroup', [
            'id' => 3,
            'userId' => 3,
            'userGroupId' => 1
        ]);
        $this->insert('userToUserGroup', [
            'id' => 4,
            'userId' => 4,
            'userGroupId' => 1
        ]);
        $this->insert('userToUserGroup', [
            'id' => 5,
            'userId' => 5,
            'userGroupId' => 1
        ]);

        $this->insert('userToUserGroup', [
            'id' => 6,
            'userId' => 1,
            'userGroupId' => 2
        ]);
        $this->insert('userToUserGroup', [
            'id' => 7,
            'userId' => 5,
            'userGroupId' => 2
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

        echo "m211016_101654_add_user_group cannot be reverted.\n";

        return false;
    }
}
