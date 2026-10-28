<?php

namespace App\Mail;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ParticipantOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Participant $participant,
        public int $otp
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your One-Time Verification Code',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.participant-otp',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
