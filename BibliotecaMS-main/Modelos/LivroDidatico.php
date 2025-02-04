<?php

require_once("Modelos/Livro.php");

class LivroDidatico extends Livro
{
    public const TIPO_DIDATICO = "Didático";

    //atributos
    private string $materia;
    
    //construct
    public function __construct($id, $g, $tit, $au, $ed, $materia)
    {
        parent::__construct($id, $g, $tit, $au, $ed);
        $this->materia = $materia;
    }
    
    //metodos
    public function getTipo(): string
    {
        return self::TIPO_DIDATICO;
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