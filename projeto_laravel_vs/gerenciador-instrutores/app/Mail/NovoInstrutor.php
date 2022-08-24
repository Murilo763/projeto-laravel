<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoInstrutor extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $idade;
    public $turno;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $idade, $turno)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->turno = $turno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.instrutor.novo-instrutor');
    }
}
