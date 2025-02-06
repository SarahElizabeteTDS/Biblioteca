<?php

//require dos modelos de livro
require_once("Modelos/Livro.php");
require_once("Modelos/LivroDidatico.php");
require_once("Modelos/LivroEstrangeiro.php");
require_once("Modelos/LivroNacional.php");
//require dos DAO
require_once("DAO/LivroDAO.php");

//para testar a conexão quando precisar
/*require_once("Util/Conexao.php");
$con = conexao::getCon();
print_r($con);*/

$opcao = 0;
do 
{
    print "\n*****************************************\n";
    print "*   MENU DE OPÇÕES - BIBLIOTECÁRIO      *\n";
    print "*****************************************\n";
    print " 1 - Cadastrar Livro                    \n";
    print " 2 - Listar Livros                     \n";
    print " 3 - Buscar Livros                     \n";
    print " 4 - Excluir Livro                     \n";
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
            print " 1 - Cadastrar Livro Nacional\n";
            print " 2 - Cadastrar Livro Estrangeiro\n";
            print " 3 - Cadastrar Livro Didático\n";
            
            $escolhaLivro = readline("Qual tipo de livro você gostaria de cadastar? ");
            
            if ($escolhaLivro == 1) 
            {
                $livroNac = new LivroNacional(0, readline("Insira o gênero: "), readline("Insira o título: "), readline("Insira o(a) autor(a): "), readline("Insira a editora: "), readline("Insira a regiao do Brasil a qual este livro pertence: "));
                $livroDao = new LivroDAO();
                $livroDao->InserirLivro($livroNac);
            }elseif ($escolhaLivro == 2) 
            {
                $livroEst = new LivroEstrangeiro(0, readline("Insira o gênero: "), readline("Insira o título: "), readline("Insira o(a) autor(a): "), readline("Insira a editora: "), readline("Insira o país de origem: "));
                $livroDao = new LivroDAO();
                $livroDao->InserirLivro($livroEst);
            }elseif ($escolhaLivro == 3)
            {
                $livroDid = new LivroDidatico(0, readline("Insira o gênero: "), readline("Insira o título: "), readline("Insira o(a) autor(a): "), readline("Insira a editora: "), readline("Insira a matéria: "));
                $livroDao = new LivroDAO();
                $livroDao->InserirLivro($livroDid);
            }else
            {
                print "Opção inválida!";
                break;
            }
            
        break;
        
        case 2:
            $livroDao = new LivroDAO();
            $livros = $livroDao->ListarLivros();

            foreach($livros as $l)
            {
                print $l;
            }
        break;

        case 3:
            $livroDao = new LivroDAO();

            print " 1 - Por ID\n";
            print " 2 - Por Título\n";
            $TituloorId = readline("Você deseja buscar por Id ou por Título? ");

            if ($TituloorId == 1) 
            {
                $id = readline("Insira o Id do livro que você deseja buscar: ");

                $livro = $livroDao->BuscarLivrosId($id);

                if ($livro != null) 
                {
                    print $livro;
                }else
                {
                    print "Livro não encontrado. Tente novamente.\n";
                }
            }elseif ($TituloorId == 2) 
            {
                $titulo = readline("Insira o título do livro que você deseja buscar: ");
                $livro = $livroDao->BuscarLivrosTitulo($titulo);

                if ($livro != null) 
                {
                    print $livro;
                }else
                {
                    print "Livro não encontrado. Tente novamente.\n";
                }
            }else
            {
                print "Opcao não existe.";
                break;
            }

        break;

        case 4:
            $livroDao = new LivroDAO();
            $livros = $livroDao->ListarLivros();

            foreach($livros as $l)
            {
                print $l;
            }

            print "\n";

            print " 1 - Por ID\n";
            print " 2 - Por Título\n";
            $TituloorId = readline("Você deseja excluir por Id ou por Título? ");

            if ($TituloorId == 1) 
            {
                if ($livro != null) 
                {
                    $id = readline("Insira  o id do livro que deseja exluir: ");
                    
                    $livroDao->ExcluirLivroId($id);
                    print "Livro excluído com sucesso!\n";
                }else
                {
                    print "Livro não encontrado\n";
                }   

            }elseif ($TituloorId == 2) 
            {
                if ($livro != null) 
                {
                    $titulo = readline("Insira  o título do livro que deseja exluir: ");
                    
                    $livroDao->ExcluirLivroTitulo($titulo);
                    print "Livro excluído com sucesso!\n";
                }else
                {
                    print "Livro não encontrado\n";
                }
                
            }else
            {
                print "Opcao não existe.";
                break;
            }
            
        break;
    
        default:
            print "\nOpção inválida\n";
            system("clear");
    }

}while($opcao != 0);
