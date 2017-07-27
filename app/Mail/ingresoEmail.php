<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ingresoEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre;
    public $in_monto;
    public $in_concepto;
    public $pagos;
    public $fecha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$in_monto,$in_concepto,$pagos,$fecha)
    {
        $this->nombre=$nombre;
        $this->in_monto=$in_monto;
        $this->in_concepto=$in_concepto;
        $this->pagos=$pagos;
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
        return $this->view('emails.ingreso_email')
        ->subject('Nuevo Ingreso Registrado');
    }
}
