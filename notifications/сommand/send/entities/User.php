<?php

namespace app\notifications\command\send\entities;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string|null $phone
 * @property string|null $email
 *
 * @property Usertousergroup[] $usertousergroups
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['phone', 'email'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Usertousergroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsertousergroups()
    {
        return $this->hasMany(Usertousergroup::className(), ['userId' => 'id']);
    }
}
