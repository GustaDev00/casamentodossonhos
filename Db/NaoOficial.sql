create database NaoOficial;
use NaoOficial;

create table usuarios(
    cod_usu int primary key auto_increment,
    email varchar(50) not null unique,
    nome varchar(30) not null,
    senha varchar(30) not null,
    url_foto_usu varchar(50) null
)