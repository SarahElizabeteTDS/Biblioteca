<?php

abstract class Pessoa
{
    //atributos 
    protected string $nome;
    protected int $id;
    protected int $documento;
    protected string $ocupacao;
    protected string $senha;
    protected string $email;
    
    //construct
    public function __construct($n, $id, $doc, $ocu, $se, $em)
    {
        $this->nome = $n;
        $this->id = $id;
        $this->documento = $doc;
        $this->ocupacao = $ocu;
        $this->senha = $se;
        $this->email = $em;
    }
    
    //tostring
    //depois bontinho os dados
    //metodos abstratos
    //depois
    
    //getsetts
    
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDocumento(): int
    {
        return $this->documento;
    }
    
    public function setDocumento(int $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getOcupacao(): string
    {
        return $this->ocupacao;
    }

    public function setOcupacao(string $ocupacao): self
    {
        $this->ocupacao = $ocupacao;

        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}