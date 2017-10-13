<?php

/**
 * summary
 */
class Usuario
{
    private $id;
    private $nome;

    public function __construct($nome, $id = null)
    {
        $this->nome = $nome;
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getId()
    {
        return $this->id;
    }
}