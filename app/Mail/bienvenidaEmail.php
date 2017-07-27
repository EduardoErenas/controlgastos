<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class bienvenidaEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre;
    public $password;
    public $email;
    public $fecha;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$password,$email,$fecha)
    {
        $this->nombre=$nombre;
        $this->password=$password;
        $this->email=$email;
        $this->fecha=$fecha;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bienvenida_email')
        ->subject('Bienvenido(a) a Control de Gastos');
    }
}
