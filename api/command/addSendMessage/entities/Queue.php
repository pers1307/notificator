<?php

namespace app\api\command\addSendMessage\entities;

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
     * Queue constructor.
     * @param string $type
     * @param string|null $params
     * @param int|null $status
     */
    public function __construct($type, $params, $status)
    {
        $this->type = $type;
        $this->params = $params;
        $this->status = $status;
    }

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
