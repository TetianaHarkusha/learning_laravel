<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use App\Models\UserLogin;

class UserRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The registered user.
     *
     * @var \App\Models\UserLogin
     */
    protected $user;

    /**
     * Create a new message instance.
     * 
     * @param  \App\Models\UserLogin  $userLogin
     * @return void
     */
    public function __construct(UserLogin $userLogin)
    {
        $this->user = $userLogin;
        $this->onQueue('emails');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'User Registered',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.users.registration',
            with: [
                'login' => $this->user->login,
                'name' => $this->user->user->name,
                'email' => $this->user->email,
                'role' => $this->user->role->name,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
