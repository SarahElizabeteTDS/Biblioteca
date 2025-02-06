<?php

abstract class Livro
{
    //atributos 
    protected int $id;
    protected string $genero;
    protected string $titulo;
    protected string $autor;
    protected string $editora;

    //construct
    public function __construct($id, $g, $tit, $au, $ed)
    {
        $this->id = $id;
        $this->genero = $g;
        $this->titulo = $tit;
        $this->autor = $au;
        $this->editora = $ed;
    }
    
    public function __toString(): string
    {
        return "\nLivro\n" .
           "----------------------\n" .
           "ID: {$this->id}\n" .
           "Tipo: {$this->getTipo()}\n" .
           "Gênero: {$this->genero}\n" .
           "Título: {$this->titulo}\n" .
           "Autor: {$this->autor}\n" .
           "Editora: {$this->editora}\n" .
           "----------------------";
    }
    //metodos
    public abstract function getTipo(): string;

    //getssets
    public function getId(): int
    {
        return $this->id;
    }

    public function getGenero(): string
    {
        return $this->genero;
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

    public function setarGenero(string $genero):self{
        if (empty($genero)){
            throw new InvalidArgumentException("Sem gênero, escolha um");
        }
        $this->genero = $genero;
        return $this;
    }
}