<?php

namespace App\Jobs;

use App\Mail\AnswerToAppeal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAnswerToAppealMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $subject,
        private string $text,
        private string $email_to,
    )
    { }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->email_to)->send(new AnswerToAppeal($this->subject, $this->text));
        } catch (\Throwable $exception) {
            Log::error("Ошибка отправки ответа на обращение: " . $exception->getMessage());
        }

    }
}
