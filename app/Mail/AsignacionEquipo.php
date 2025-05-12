<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AsignacionEquipo extends Mailable
{
    use Queueable, SerializesModels;

    public $equipo;
    public $usuario;
    /**
     * Create a new message instance.
     */
    public function __construct($equipo, $usuario)
    {
        $this->equipo = $equipo;
        $this->usuario = $usuario;
    }

    public function build(): self
    {
        return $this->subject('Asignación de equipo')
            ->markdown('emails.asignacion-equipo');
    }
}
