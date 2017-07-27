<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class gastoEmail extends Mailable
{
    use Queueable, SerializesModels; 
    public $nombre;
    public $ga_monto;
    public $ga_concepto;
    public $fecha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$ga_monto,$ga_concepto,$fecha)
    {
        $this->nombre=$nombre;
        $this->ga_monto=$ga_monto;
        $this->ga_concepto=$ga_concepto;
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
        return $this->view('emails.gastos_email')
        ->subject('Nuevo Gasto Registrado');
    }
}
