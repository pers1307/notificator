<?php

namespace app\notifications\command\send\renders;

use app\notifications\command\send\entities\EmailTemplate;
use app\notifications\command\send\Message;
use app\notifications\command\send\renderResults\EmailRenderResult;

class EmailRender extends AbstractRender
{
    public $name = "email";

    public function process(Message $message)
    {
        $templateName = $message->channels[$this->name];

        $templateName = EmailTemplate::findOne(["name" => $templateName]);
        $params = json_decode($message->params, true);

        $text = $this->render($templateName, $params);

        return new EmailRenderResult($message, $text);
    }

    private function render(EmailTemplate $emailTemplate, array $params)
    {
        extract($params, EXTR_PREFIX_SAME, "same");

        return $emailTemplate->templateText;
    }
}