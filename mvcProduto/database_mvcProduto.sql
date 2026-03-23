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