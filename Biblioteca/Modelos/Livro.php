<?php

abstract class Livro
{
    //atributos
    protected int $id;
    protected string $genero;
    protected string $titulo;
    protected string $autor;
    protected string $editora;
    protected string $paisOrigem; //so no estrageiro!
    
    //construct
    public function __construct($id, $g, $tit, $au, $ed, $pa)
    {
        $this->id = $id;
        $this->genero = $g;
        $this->titulo = $tit;
        $this->autor = $au;
        $this->editora = $ed;
        $this->paisOrigem = $pa;
    }
    
    //tostring
    //->fazer bonitinho com capa
    //metodos
    abstract function getTipo();
    //getssets

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }
    
    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }
    
    public function getEditora(): string
    {
        return $this->editora;
    }

    public function setEditora(string $editora): self
    {
        $this->editora = $editora;

        return $this;
    }

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