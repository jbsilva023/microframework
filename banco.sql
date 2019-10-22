DROP DATABASE vikings;

CREATE DATABASE vikings;

USE vikings;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    tabeliao VARCHAR(200) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    documento VARCHAR(14) NOT NULL,
    telefone varchar (10),
    razao VARCHAR (200) NOT NULL,
    status boolean NOT NULL default 1
);

CREATE TABLE enderecos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    uf CHAR(2) NOT NULL,
    bairro VARCHAR (100) NOT NULL,
    cidade VARCHAR (100) NOT NULL,
    status boolean NOT NULL default 1
);

INSERT INTO users (nome, tabeliao, email, documento, telefone, razao) VALUES ( 'Jonas Barbosa da Silva', 'João Felipe', 'jbsilva023@gmail.com', '02551049105', '61996470708', '1º Serventia de teste');