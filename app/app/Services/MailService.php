<?php

namespace App\Services;

use App\Enums\QueuePriority;
use App\Jobs\SendAnswerToAppealMail;

class MailService
{
    public function __construct(
        private string $text,
        private string $subject,
        private string $email_to,
    )
    {
    }

    public function send(): void
    {
        // стоит переделать в фабрику, но тут с сериализацией проблемы пойдут возможно
        SendAnswerToAppealMail::dispatch($this->subject, $this->text, $this->email_to)->onQueue(QueuePriority::Medium->value);
    }
}
