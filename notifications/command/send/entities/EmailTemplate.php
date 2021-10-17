<?php

namespace app\notifications\command\send\entities;

use Yii;

/**
 * This is the model class for table "emailtemplate".
 *
 * @property int $id
 * @property string $name
 * @property string|null $templateText
 */
class EmailTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emailtemplate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['templateText'], 'string'],
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
            'templateText' => 'Template Text',
        ];
    }
}
