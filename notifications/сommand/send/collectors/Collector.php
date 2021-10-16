<?php

namespace app\notifications\command\send\collectors;

use app\notifications\command\send\exceptions\RenderNotFoundException;
use app\notifications\command\send\exceptions\SenderNotFoundException;
use app\notifications\command\send\Message;
use app\notifications\command\send\renders\AbstractRender;
use app\notifications\command\send\renders\IRender;
use app\notifications\command\send\senders\AbstractSender;

class Collector implements IRender
{
    /**
     * @var array
     */
    private $renders;

    /**
     * @var array
     */
    private $senders;

    /**
     * Collector constructor.
     * @param array $renders
     * @param array $senders
     */
    public function __construct(array $renders, array $senders)
    {
        $this->renders = $renders;
        $this->senders = $senders;
    }

    public function process(Message $message)
    {
        foreach ($message->channels as $typeChannel => $templateName)
        {
            /** @var AbstractRender $render */
            $render = $this->getRender($typeChannel);

            /** @var AbstractSender $sender */
            $sender = $this->getSender($typeChannel);

            $renderResult = $render->process($message);
            $sender->send($renderResult);
        }
    }

    /**
     * @param string $typeChannel
     * @return AbstractRender
     * @throws RenderNotFoundException
     */
    private function getRender($typeChannel)
    {
        foreach ($this->renders as $render)
        {
            if ($render->name === $typeChannel)
                return $render;
        }

        throw new RenderNotFoundException("Рендер с типом $typeChannel не найден");
    }

    /**
     * В теории могут быть несколько отправителей на один рендер
     * но сейчас это реализовывать не будем
     *
     * @param string $typeChannel
     * @return AbstractRender
     * @throws SenderNotFoundException
     */
    private function getSender($typeChannel)
    {
        foreach ($this->senders as $sender)
        {
            if ($sender->name === $typeChannel)
                return $sender;
        }

        throw new SenderNotFoundException("Сендер с типом $typeChannel не найден");
    }
}