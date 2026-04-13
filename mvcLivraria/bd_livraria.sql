create database livrariaLaravel;
use livrariaLaravel;

CREATE TABLE livro(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
autor VARCHAR(100),
descricao VARCHAR(100),
num_paginas INT(100),
data_publicacao DATE,
created_at timestamp null,
updated_at timestamp null
);
CREATE TABLE editora(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
cnpj INT NOT NULL,
pais VARCHAR(100),
cidade VARCHAR(100),
created_at timestamp null,
updated_at timestamp null
);

CREATE TABLE detalhes(
id INT AUTO_INCREMENT PRIMARY KEY,
custo INT (100),
preco_venda INT (100),
imposto INT NOT NULL,
created_at timestamp null,
updated_at timestamp null
);
ALTER TABLE livro
ADD COLUMN editora_id INT NULL,
ADD CONSTRAINT fk_livro_editora
FOREIGN KEY (editora_id)
REFERENCES Editoras(id)
ON DELETE SET NULL;

ALTER TABLE Detalhes
ADD COLUMN livro_id INT NULL,
ADD CONSTRAINT fk_livro_detalhe
FOREIGN KEY (livro_id)
REFERENCES Livro(id)
ON DELETE SET NULL;


select * from livro;
select * from editora;
select * from detalhes;

