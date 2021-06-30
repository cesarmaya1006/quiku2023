<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SDI_RespuestaReposicion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id_pqr;
    public function __construct($id_pqr)
    {
        $this->id_pqr = $id_pqr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contacto@quiku.com')->view('intranet.emails.sdi_respuesta_reposicion_email')->with(['id_pqr' => $this->id_pqr,]);
    }
}
