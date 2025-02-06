CREATE TABLE Livro 
(
    Id int primary key auto_increment not null,  
    Tipo varchar(1) not null, /* N=Nacional, D=Didático, E=Estrangeiro */
    Genero varchar(20) not null,
    Titulo varchar(50) not null,
    Autor varchar(50) not null,
    Editora varchar(20) not null, 
    PaisOrigem varchar(20),
    RegiaoBrasil varchar(20),
    Materia varchar(20)
);