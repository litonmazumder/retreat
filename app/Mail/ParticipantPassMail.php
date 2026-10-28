<?php

namespace App\Mail;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;


class ParticipantPassMail extends Mailable
{
    use Queueable, SerializesModels;

    public Participant $participant;

    public bool $isResend;

    public function __construct(
        Participant $participant,
        bool $isResend = false
    )
    {
        $this->participant = $participant;
        $this->isResend = $isResend;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->isResend
                ? 'Asia Seminar 2026 - Participant ID Reminder'
                : 'Asia Seminar 2026 - Registration Confirmation'
        );
    }

    public function build()
    {
        return $this
            ->subject('Your Asia Seminar 2026 Event Pass')
            ->view('email.participant-pass');
    }
}