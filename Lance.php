<?php

class Lance
{

    private $usuario;
    private $valor;

    public function __construct($usuario, $valor)
    {
        $this->usuario = $usuario;
        $this->valor = $valor;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getValor()
    {
        return $this->valor;
    }
}