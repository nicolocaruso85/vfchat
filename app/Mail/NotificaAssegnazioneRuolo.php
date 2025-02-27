<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Queue\SerializesModels;

class NotificaAssegnazioneRuolo extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($azienda = $this->user->aziende->first()) {
            setPermissionsTeamId($azienda->id);
        }

        $ruoli = $this->user->getRoleNames()->implode(', ');
 
        return $this->subject('Un nuovo ruolo ti è stato assegnato')
            ->markdown('emails.notifica-assegnazione-ruolo', [
                'user' => $this->user,
                'ruoli' => $ruoli,
            ]);
    }
}
