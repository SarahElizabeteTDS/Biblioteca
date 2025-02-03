CREATE TABLE Livro 
(
    IDLivro int primary key auto_increment not null,  
    Tipo varchar(1) not null, /* N=Nacional, D=Didático, E=Estrangeiro */
    Genero varchar(20) not null,
    Titulo varchar(50) not null,
    Autor varchar(50) not null,
    Editora varchar(20) not null, 
    Pais varchar(20) not null,
    RegiaoBrasil varchar(20),
);

CREATE TABLE Pessoa 
(
    IDPessoa int primary key auto_increment not null,  
    Nome varchar(50) not null,
    Documento varchar(11) not null,
    Ocupacao varchar(20) not null,
    Senha varchar(10) not null,
    Email varchar(20)
);

