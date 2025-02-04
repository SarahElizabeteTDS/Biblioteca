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
            print "arrumar depois isso";
        }
    }

    public function ListarLivros()
    {
        $sql = "SELECT * FROM Livro";

        $con = conexao::getCon();

        $stm = $con->prepare($sql);
        $stm->execute();

        $registros = $stm->fetchAll();
        
        $livros = $this->mapLivros($registros);

        return $livros;
    }

    private function mapLivros(array $registros) //arrumar isso amanha <3
    {
        $livros = array();
        
        foreach ($registros as $reg) 
        {
            $livro = null;
            
            if ($reg['tipo'] == 'N') 
            {
                $livro = new LivroNacional($reg['id'], $reg['genero'], $reg['titulo'], $reg['autor'], $reg['editora'], StatusLivro::from($reg['status']));
            }elseif ($reg['tipo'] == 'E')
            {   
                $livro = new LivroEstrangeiro($reg['id'], $reg['genero'], $reg['titulo'], $reg['autor'], $reg['editora'], StatusLivro::from($reg['status']));
            }else
            {   
                $livro = new LivroDidatico($reg['id'], $reg['genero'], $reg['titulo'], $reg['autor'], $reg['editora'], StatusLivro::from($reg['status']));
            }
            
            $livro->setTitulo($reg['titulo']);
            
            array_push($livros, $livro);
        }
        return $livros;
    }
}