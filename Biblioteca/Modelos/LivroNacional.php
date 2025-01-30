<?php

require_once("Modelos/Livro.php");

class LivroNacional extends Livro
{
    //atributos
    private string $regiaoBrasil;
    
    //construct
    public function __construct($id, $g, $tit, $au, $ed, $pa, $rb)
    {
        parent::__construct($id, $g, $tit, $au, $ed, $pa);
        $this->regiaoBrasil = $rb;
    }
    
    //metodos
    public function getTipo()
    {
        return "Livro Nacional";
    }
    
    //gets e setts (sobreescrevendo do pai)
    public function getPaisOrigem(): string
    {
        return "Brasil";
    }
    
    public function getRegiaoBrasil(): string
    {
        return $this->regiaoBrasil;
    }

    public function setRegiaoBrasil(string $regiaoBrasil): self
    {
        $this->regiaoBrasil = $regiaoBrasil;

        return $this;
    }
}