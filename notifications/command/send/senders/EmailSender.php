<?php

namespace app\notifications\command\send\senders;

use app\notifications\command\send\entities\User;
use app\notifications\command\send\entities\UserGroup;
use app\notifications\command\send\exceptions\NotEmailsForRecieveException;
use app\notifications\command\send\Message;
use Yii;

class EmailSender extends AbstractSender
{
    private $fromEmail = "no-reply@mail.ru";

    public $name = "email";

    public function send($renderResult)
    {
        $emails = $this->GetEmailsToSend($renderResult->message);

        if (count($emails) > 0) {
            Yii::$app->mailer->compose()
                ->setFrom($this->fromEmail)
                ->setTo($emails)
                ->setSubject('Письмо')
                ->setTextBody($renderResult->text)
                ->send();

            return;
        }

        throw new NotEmailsForRecieveException("Нет почты для отправки");
    }

    /**
     * @param Message $message
     * @return array
     */
    private function GetEmailsToSend(Message $message)
    {
        $groupId = $message->groupId;
        if (!empty($groupId)) {
            $userGroup = UserGroup::findOne(['id' => $groupId]);

            if (!empty($userGroup)) {
                $users = $userGroup->getUsers();

                $emails = [];
                /** @var User $user */
                foreach ($users as $user) {
                    if (!empty($user->email)) {
                        $emails[] = $user->email;
                    }
                }

                return $emails;
            }
        }

        $userId = $message->userId;
        if (!empty($userId)) {
            $user = User::findOne(['id' => $userId]);

            if (!empty($user)) {
                return [$user->email];
            }
        }

        return [];
    }
}