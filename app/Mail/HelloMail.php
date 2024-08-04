<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $userEmail;
    public $userPass;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $userEmail, $userPass)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userPass = $userPass;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ryslan.nigmatyllin2001@mail.ru', 'Tech-city'),
            subject: 'Приветствуем на сайте Tech-city!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.hello',
            with: [
                'userName' => $this->userName,
                'userPass' => $this->userPass,
                'userEmail' => $this->userEmail
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
