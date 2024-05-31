<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MonMail extends Mailable
{
    use Queueable, SerializesModels;

    public $description;
    public $nomProjet;
    public $refProjet;
    /**
     * Create a new message instance.
     */
    public function __construct($nomProjet,$refProjet,$description)
    {
        $this->nomProjet = $nomProjet;
        $this->description=$description;
        $this->refProjet = $refProjet;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:('Projet'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.monmail',
            with:([
                "Nom Projet" => $this->nomProjet,
                "refProjet"=>$this->refProjet,
                "description"=>$this->description])
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
