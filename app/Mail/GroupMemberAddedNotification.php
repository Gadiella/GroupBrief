<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class GroupMemberAddedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $newMember;
    public $addedBy;
    public $groupName;


    /**
     * Create a new message instance.
     */
    public function __construct($newMember, $addedBy, $groupName, )
    {
        $this->newMember = $newMember;
        $this->addedBy = $addedBy;
        $this->groupName = $groupName;
        
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('accounts@unetah.net', 'gagachou')
                
                    ->subject('Un nouveau membre a été ajouté au groupe')
                    ->view('mail.GroupMemberAddedNotification')
                    ->with([
                        'newMember' => $this->newMember,
                        'addedBy' => $this->addedBy,
                        'groupName' => $this->groupName,
                     
                    ]);
    }
}