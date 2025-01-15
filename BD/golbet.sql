create database golbet;
use golbet;

create table cadastro(
cpf varchar (30) primary key not null,
nome varchar (50) not null,
email varchar (50) not null,
telefone varchar (20) not null,
nascimento date not null,
senha varchar (20) not null

);