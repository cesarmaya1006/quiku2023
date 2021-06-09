<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CambioSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $datosId;
    public $datosTitulo;
    public $datosCambio;

    public function __construct($datosId, $datosTitulo, $datosCambio)
    {
        $this->datosId = $datosId;
        $this->datosTitulo = $datosTitulo;
        $this->datosCambio = $datosCambio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contacto@quiku.com')->view('intranet.empresa.solicitud.cambioconsulta')->with(['id' => $this->datosId, 'titulo' => $this->datosTitulo, 'cambio' => $this->datosCambio,]);
    }
}
