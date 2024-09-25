<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InviteToGroupMail extends Mailable
{
    use Queueable, SerializesModels;

  public $groupName;
  public $inviteeName;
    public function __construct($groupName,$inviteeName)
    {
      $this->groupName = $groupName ;
      $this->inviteeName = $inviteeName;  
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Invite To Group Mail',
        );
    }
    public function build()
    {
        return $this->subject('Invitation à rejoindre le groupe ' . $this->groupName)
                    ->view('mail.invite_to_group')
                    ->with([
                        'groupName' => $this->groupName,
                        'inviteeName' => $this->inviteeName,
                    ]);
    }
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    // public function attachments()
    // {
    //     return [];
    // }
}
