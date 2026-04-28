create database mvc_empresa;
use mvc_empresa;

CREATE TABLE Departamento (
ID INTEGER AUTO_INCREMENT PRIMARY KEY,
NOME VARCHAR(255),
DATA_CRIACAO DATE,
ORCAMENTO INT(255),
SIGLA VARCHAR(255),
created_at timestamp null,
updated_at timestamp null
);
SELECT * FROM Departamento;

CREATE TABLE Funcionarios (
ID INTEGER AUTO_INCREMENT PRIMARY KEY,
NOME VARCHAR(255),
CARGO VARCHAR(255),
EMAIL VARCHAR(255),
DATA_ADMISSAO DATE,
SALARIO INTEGER,
SOBRENOME VARCHAR(255),
created_at timestamp null,
updated_at timestamp null
);
SELECT * FROM Funcionarios;


CREATE TABLE DadosPessoais (
CPF INTEGER,
RG INTEGER,
DATA_NASCIMETO DATE,
CEP INTEGER,
created_at timestamp null,
updated_at timestamp null
);

SELECT * FROM DadosPessoais;