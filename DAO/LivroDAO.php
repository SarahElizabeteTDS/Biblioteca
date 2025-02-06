<?php

require_once("Modelos/Livro.php");
require_once("Modelos/LivroDidatico.php");
require_once("Modelos/LivroEstrangeiro.php");
require_once("Modelos/LivroNacional.php");

require_once("Util/Conexao.php");

class LivroDAO
{
    public function InserirLivro(Livro $livro)
    {
        $sql = "INSERT INTO Livro(Id, Tipo, Genero, Titulo, Autor, Editora, PaisOrigem, RegiaoBrasil, Materia) VALUES (?,?,?,?,?,?,?,?,?)";

        $con = conexao::getCon();

        $stm = $con->prepare($sql);

        if($livro instanceof LivroNacional)
        {
            $stm->execute(array($livro->getId(), $livro->getTipo(), $livro->getGenero(), $livro->getTitulo(), $livro->getAutor(), $livro->getEditora(), null, $livro->getRegiaoBrasil(), null));
        }else if($livro instanceof LivroEstrangeiro)
        {
            $stm->execute(array($livro->getId(), $livro->getTipo(), $livro->getGenero(), $livro->getTitulo(), $livro->getAutor(), $livro->getEditora(), $livro->getPaisOrigem(), null, null));
        }else if($livro instanceof LivroDidatico)
        {
            $stm->execute(array($livro->getId(), $livro->getTipo(), $livro->getGenero(), $livro->getTitulo(), $livro->getAutor(), $livro->getEditora(), null, null, $livro->getMateria()));
        }else
        {
            print "Não foi possível inserir o livro";
            die();
        }
    }

    public function ListarLivros()
    {
        $sql = "SELECT * FROM Livro";

        $con = conexao::getCon();

        $stm = $con->prepare($sql);
        $stm->execute();

        $registros = $stm->fetchAll();
        
        $livros = $this->MapLivros($registros);

        return $livros;
    }

    public function BuscarLivrosTitulo($titulo)
    {
        $con = conexao::getCon();
        
        $sql = "SELECT * FROM Livro WHERE Titulo = ?";
        
        $stm = $con->prepare($sql);
        $stm->execute([$titulo]);
        
        $registros = $stm->fetchAll();
        
        $livros = $this->MapLivros($registros);
        
        if (count($livros) > 0) 
        {
            return $livros[0];
        }else
        {
            return null;
        }
    }

    public function BuscarLivrosId($id)
    {
        $con = conexao::getCon();
        
        $sql = "SELECT * FROM Livro WHERE Id = ?";
        
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
        
        $registros = $stm->fetchAll();
        
        $livros = $this->MapLivros($registros);
        
        if (count($livros) > 0) 
        {
            return $livros[0];
        }else
        {
            return null;
        }
    }

    public function ExcluirLivroTitulo($titulo)
    {
        $con = conexao::getCon();
        
        $sql = "DELETE FROM Livro WHERE Titulo = ?";
        
        $stm = $con->prepare($sql);
        $stm->execute([$titulo]);
        
        $registros = $stm->fetchAll();
        
        $livros = $this->MapLivros($registros);
        
        return $livros;
    }

    public function ExcluirLivroId($id)
    {
        $con = conexao::getCon();
        
        $sql = "DELETE FROM Livro WHERE Id = ?";
        
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
        
        $registros = $stm->fetchAll();
        
        $livros = $this->MapLivros($registros);
        
        return $livros;
    }

    private function MapLivros(array $registros) 
    {
        $livros = array();
        
        foreach ($registros as $reg) 
        {
            $livro = null;
            
            if ($reg['Tipo'] == 'N') 
            {
                $livro = new LivroNacional($reg['Id'], $reg['Genero'], $reg['Titulo'], $reg['Autor'], $reg['Editora'], $reg['RegiaoBrasil']);
            }elseif ($reg['Tipo'] == 'E')
            {   
                $livro = new LivroEstrangeiro($reg['Id'], $reg['Genero'], $reg['Titulo'], $reg['Autor'], $reg['Editora'], $reg['PaisOrigem']);
            }else
            {   
                $livro = new LivroDidatico($reg['Id'], $reg['Genero'], $reg['Titulo'], $reg['Autor'], $reg['Editora'], $reg['Materia']);
            }
            
            $livro->setTitulo($reg['Titulo']);
            
            array_push($livros, $livro);
        }
        return $livros;
    }
}