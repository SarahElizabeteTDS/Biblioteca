<?php

require_once("Modelos/Livro.php");

class LivroDidatico extends Livro
{
    //atributos
    private string $materia;
    
    //construct
    public function __construct($id, $g, $tit, $au, $ed, $materia)
    {
        parent::__construct($id, $g, $tit, $au, $ed);
        $this->materia = $materia;
    }
    
    //metodos
    public function getTipo()
    {
        return "D";
    }
    
    //gets e setts
    public function getMateria(): string
    {
        return $this->materia;
    }

    public function setMateria(string $materia): self
    {
        $this->materia = $materia;

        return $this;
    }
}