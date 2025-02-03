<?php

require_once("Modelos/Livro.php");

class LivroNacional extends Livro
{
    //atributos
    private string $regiaoBrasil;
    
    //construct
    public function __construct($id, $g, $tit, $au, $ed, $rb)
    {
        parent::__construct($id, $g, $tit, $au, $ed);
        $this->regiaoBrasil = $rb;
    }
    
    //classes abstratas do pai
    public function getTipo()
    {
        return "Livro Nacional";
    }
    
    //gets e setts 
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