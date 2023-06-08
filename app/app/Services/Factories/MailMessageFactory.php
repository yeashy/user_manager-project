<?php

namespace App\Services\Factories;

use App\Enums\MailMessageType;
use App\Jobs\SendAnswerToAppealMail;
use OutOfRangeException;

class MailMessageFactory
{
    public function __invoke(MailMessageType $messageType, array $params): void
    {
        switch ($messageType) {
            case MailMessageType::AnswerToAppeal:
                SendAnswerToAppealMail::dispatch($params['subject'], $params['text'], $params['email_to']);
                break;
            default:
                throw new OutOfRangeException();
        }
    }
}
