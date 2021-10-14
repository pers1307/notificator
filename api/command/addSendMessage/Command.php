<?php

namespace app\api\command\addSendMessage;

class Command
{
    /**
     * @var int
     */
    public $userId;

    /**
     * @var int
     */
    public $groupId;

    /**
     * @var array
     */
    public $channels;

    /**
     * @var string json
     */
    public $params;

    /**
     * Command constructor.
     *
     * @param int $userId
     * @param int $groupId
     * @param array $channels
     * @param string $params
     */
    public function __construct($userId, $groupId, array $channels, $params)
    {
        $this->userId = $userId;
        $this->groupId = $groupId;
        $this->channels = $channels;
        $this->params = $params;
    }


}