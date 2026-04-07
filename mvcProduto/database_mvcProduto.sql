create database produtoLaravel;
use produtoLaravel;

CREATE TABLE produtos(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255),
quantidade INT(100),
preco DOUBLE,
created_at timestamp null,
updated_at timestamp null
);
CREATE TABLE setores(
id INT AUTO_INCREMENT PRIMARY KEY,
nome varchar(255) null,
n_corredor INT NOT NULL,
created_at timestamp null,
updated_at timestamp null

);
select * from setores;

CREATE TABLE detalhesProduto(
id INT AUTO_INCREMENT PRIMARY KEY,
descricao varchar(255) null,
tamanho INT NOT NULL,
peso INT NOT NULL,
created_at timestamp null,
updated_at timestamp null

);