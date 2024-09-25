<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class OtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;


    public $password;
    public $authCode;

    /**
     * Create a new message instance.
     */
    public function __construct($password = null, $authCode = null)
    {
        $this->password = $password;
        $this->authCode = $authCode;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Otp Code Mail',
            from: new Address('accounts@unetah.net', 'gagachou'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.message',
            with : [
                'password' => $this->password,
                'authCode' => $this->authCode,
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
