<?php

namespace App\Mail;

use App\Models\Answer;
use App\Models\Appeal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnswerToAppeal extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Answer To Appeal';

    /**
     * Create a new message instance.
     */
    public function __construct(
        private string $appealSubject,
        private string $answer
    )
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'На Ваше обращение получен ответ.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            text: 'emails.answer-to-appeal',
            with: [
                'appealSubject' => $this->appealSubject,
                'text' => $this->answer
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
