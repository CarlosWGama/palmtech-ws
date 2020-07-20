<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecuperarSenha extends Mailable
{
    use Queueable, SerializesModels;

    private $dados;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $token)
    {
        //
        $this->dados['usuario'] = $usuario;
        $this->dados['token'] = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.recuperar-senha', $this->dados)->subject('PalmTech - Recuperar Senha') 
    }
}
