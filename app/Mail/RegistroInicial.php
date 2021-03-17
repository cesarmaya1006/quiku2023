<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroInicial extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public $tipopersona;
    public $cedula;
    public function __construct($id,$tipopersona,$cedula)
    {
        $this->id = $id;
        $this->tipopersona = $tipopersona;
        $this->cedula = $cedula;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contacto@legalproseedings.com')->view('extranet.preregistroemail')->with(['id' => $this->id,'tipopersona' => $this->tipopersona, 'cedula' => $this->cedula]);
    }
}
