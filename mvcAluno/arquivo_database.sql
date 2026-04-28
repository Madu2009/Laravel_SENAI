create database alunoLaravel;
use alunoLaravel;

CREATE TABLE alunos(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
email VARCHAR(100),
created_at timestamp null,
updated_at timestamp null
);
use alunolaravel;
CREATE TABLE turmas(
id INT AUTO_INCREMENT PRIMARY KEY,
numSala INT NOT NULL,
serie varchar(255) null,
created_at timestamp null,
updated_at timestamp null

);
ALTER TABLE alunos
ADD COLUMN turma_id INT,
ADD CONSTRAINT fk_alunos_turmas


FOREIGN KEY (turma_id) REFERENCES turmas(id);

select * from alunos;
select * from turmas;
