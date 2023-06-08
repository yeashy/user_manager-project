<?php

namespace App\Services;

use App\Enums\MailMessageType;
use App\Enums\QueuePriority;
use App\Jobs\SendAnswerToAppealMail;
use App\Services\Factories\MailMessageFactory;

class MailService
{
    public function send(MailMessageType $messageType, array $params): void
    {
        (new MailMessageFactory())($messageType, $params);
    }
}
