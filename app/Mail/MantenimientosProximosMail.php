<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MantenimientosProximosMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mantenimientosProximos;

    /**
     * Create a new message instance.
     */
    public function __construct($mantenimientosProximos)
    {
        //
        $this->mantenimientosProximos=$mantenimientosProximos;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mantenimientos Proximos Mail',
        );
    }


    public function build(){
        return $this->view('mantenimientos.mailable',['mantenimientos'=>$this->mantenimientosProximos]);
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mantenimientos.mailable',
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
