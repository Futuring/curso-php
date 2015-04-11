create database curso;

create table curso.pessoa (
	id int not null auto_increment primary key,
	nome varchar(255) not null,
	email varchar(80) not null,
	login varchar(80) not null,
	password varchar(50) not null,
	salt varchar(50) not null,
	isadmin int not null
);