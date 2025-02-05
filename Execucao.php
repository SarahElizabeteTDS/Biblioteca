<?php

//require dos modelos de livro
require_once("Modelos/Livro.php");
require_once("Modelos/LivroDidatico.php");
require_once("Modelos/LivroEstrangeiro.php");
require_once("Modelos/LivroNacional.php");
//require dos DAO
require_once("DAO/LivroDAO.php");

//para testar a conexão quando precisar
//require_once("util/conexao.php");
//$con = conexao::getCon();
//print_r($con);

$opcao = 0;
do 
{
    print "\n*****************************************\n";
    print "*   MENU DE OPÇÕES - BIBLIOTECÁRIO      *\n";
    print "*****************************************\n";
    print " 1 - Cadastrar Livro Nacional            \n";
    print " 2 - Cadastrar Livro Estrangeiro          \n";
    print " 3 - Cadastrar Livro Didático            \n";
    print " 4 - Listar Livros                     \n";
    print " 5 - Buscar Livros                     \n";
    print " 6 - Excluir Livro                     \n";
    print " 0 - Sair                               \n";
    print "\n*****************************************\n";
    $opcao = readline("Selecione a opção (pelo índice): ");
    
    switch($opcao) 
    {
        case 0:
            print "Até mais tarde!";
            system("clear");
            return; 
        break;

        case 1:
            $livroNac = new LivroNacional(0, readline("Insira o gênero: "), readline("Insira o título: "), readline("Insira o(a) autor(a): "), readline("Insira a editora: "), readline("Insira a regiao do Brasil a qual este livro pertence: "));
            $livroDao = new LivroDAO();
            $livroDao->InserirLivro($livroNac);
        break;

        case 2:
            $livroEst = new LivroEstrangeiro(0, readline("Insira o gênero: "), readline("Insira o título: "), readline("Insira o(a) autor(a): "), readline("Insira a editora: "), readline("Insira o país de origem: "));
            $livroDao = new LivroDAO();
            $livroDao->InserirLivro($livroEst);
        break;

        case 3:
            $livroDid = new LivroDidatico(0, readline("Insira o gênero: "), readline("Insira o título: "), readline("Insira o(a) autor(a): "), readline("Insira a editora: "), readline("Insira a matéria: "));
            $livroDao = new LivroDAO();
            $livroDao->InserirLivro($livroDid);
        break;
        
        case 4:
            $livroDao = new LivroDAO();
            $livros = $livroDao->ListarLivros();

            foreach($livros as $l)
            {
                print $l;
            }
        break;

        case 5:
            $livroDao = new LivroDAO();
            $titulo = readline("Insira o título do livro que você deseja buscar: ");
            $livro = $livroDao->BuscarLivros($titulo);

            if ($livro != null) 
            {
                print $livro;
            }else
            {
                print "Livro não encontrado. Tente novamente.\n";
            }
        break;

        case 6:
            $livroDao = new LivroDAO();
            $livros = $livroDao->ListarLivros();

            foreach($livros as $l)
            {
                print $l;
            }

            print "\n";

            $titulo = readline("Insira  o título do livro que deseja exluir: ");
            
            $livro = $livroDao->BuscarLivros($titulo);
            if ($livro != null) 
            {
                $livroDao->ExcluirLivro($titulo);
                print "Livro excluído com sucesso!\n";
            }else
            {
                print "Livro não encontrado\n";
            }
        break;
    
        default:
            print "\nOpção inválida\n";
            system("clear");
    }

}while($opcao != 0);