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
    print " 2 - Cadastrar Livro Estrangeiro            \n";
    print " 3 - Cadastrar Livro Didático            \n";
    print " 4 - Excluir Livro                     \n";
    print " 5 - Listar Livros                     \n";
    print " 0 - Voltar ao Menu Principal          \n";
    print "\n*****************************************\n";
    $opcao = readline("Selecione a opção (pelo índice): ");
    
    switch($opcao) 
    {
        case 0:
            system("clear");
            return; 
        break;

        case 1:
            $livroNac = new LivroNacional(0, readline("Insira o gênero: "), readline("Insira o título: "), readline("Insira o(a) autor(a): "), readline("Insira a editora: "), readline("Insira a regiao do Brasil a qual este livro pertence: "));
            $livroDao = new LivroDAO();
            $livroDao->InserirLivro($livroNac);
        break;

        case 2:
        break;

        case 3:
        break;
        
        case 4:
        break;

        case 5:
            $livroDao = new LivroDAO();
            $livroDao->ListarLivros();
        break;
    
        default:
            print "\nOpção inválida\n";
            system("clear");
    }

}while($opcao != 0);