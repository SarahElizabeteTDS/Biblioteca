<?php

require_once("Modelos/Livro.php");

class LivroEstrangeiro extends Livro
{
    //atributos
    private string $paisOrigem;
    
    //construct
    public function __construct($id, $g, $tit, $au, $ed, $po)
    {
        parent::__construct($id, $g, $tit, $au, $ed);
        $this->paisOrigem = $po;
    }
    
    //metodos
    public function getTipo()
    {
        return "Livro Estrangeiro";
    }
    
    //gets e setts
    
    public function getPaisOrigem(): string
    {
        return $this->paisOrigem;
    }
    
    public function setPaisOrigem(string $paisOrigem): self
    {
        $this->paisOrigem = $paisOrigem;

        return $this;
    }
}