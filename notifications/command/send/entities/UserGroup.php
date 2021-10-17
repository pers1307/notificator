<?php

namespace app\notifications\command\send\entities;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "usergroup".
 *
 * @property int $id
 * @property string $name
 *
 * @property UserToUserGroup[] $usertousergroups
 */
class UserGroup extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usergroup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * Gets query for [[UserToUserGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserToUserGroups()
    {
        return $this->hasMany(UserToUserGroup::className(), ['userGroupId' => 'id']);
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this
            ->getUserToUserGroups()
            ->join('JOIN', 'user', 'userId = user.id')
            ->select('user.*')
            ->asArray()
            ->all();
    }
}
