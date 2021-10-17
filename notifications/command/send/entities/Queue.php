<?php

namespace app\notifications\command\send\entities;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "queue".
 *
 * @property int $id
 * @property string $type
 * @property string|null $params
 * @property int|null $status
 */
class Queue extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['params'], 'string'],
            [['status'], 'integer'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'params' => 'Params',
            'status' => 'Status',
        ];
    }
}
