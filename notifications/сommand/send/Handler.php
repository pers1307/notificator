<?php

namespace app\notifications\command\send;

use app\notifications\command\send\collectors\Collector;
use app\notifications\command\send\entities\Queue;
use app\notifications\command\send\helpers\MapQueueItemToCommandHelper;
use app\notifications\command\send\renders\EmailRender;
use app\notifications\command\send\renders\PushRender;
use app\notifications\command\send\renders\SmsRender;
use app\notifications\command\send\senders\EmailSender;
use app\notifications\command\send\senders\PushSender;
use app\notifications\command\send\senders\SmsSender;

class Handler
{
    /**
     * @throws exceptions\QueueTypeIsNotMessageException
     */
    public function handle(Queue $queue)
    {
        $command = MapQueueItemToCommandHelper::map($queue);
        $message = new Message($command);

        $collector = new Collector(
            [new EmailRender(), new SmsRender(), new PushRender()],
            [new EmailSender(), new SmsSender(), new PushSender()]
        );

        $collector->process($message);
    }
}