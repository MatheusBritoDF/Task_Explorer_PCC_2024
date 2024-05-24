DROP DATABASE IF EXISTS db_task_explorer;

CREATE DATABASE db_task_explorer;
USE db_task_explorer;

CREATE TABLE `usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `tipo_usuario` ENUM('Usuário Comum', 'Administrador') NOT NULL,
  PRIMARY KEY (`id_usuario`));


CREATE TABLE `kanban` (
  `id_kanban` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(60) NOT NULL,
  `visibilidade` ENUM('Área de Trabalho', 'Público', 'Privado') NOT NULL,
  `id_usuario` INT NOT NULL,
  `tela_fundo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_kanban`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
);


CREATE TABLE `listas` (
  `id_lista` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(60) NOT NULL,
  `id_kanban` INT NOT NULL,
  PRIMARY KEY (`id_lista`),
  FOREIGN KEY (`id_kanban`) REFERENCES `kanban` (`id_kanban`)
);


CREATE TABLE `cartoes` (
  `id_cartao` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(500),
  `nivel_prioridade` ENUM('ALTA', 'MÉDIA', 'BAIXA'),
  `id_lista` INT NOT NULL,
  PRIMARY KEY (`id_cartao`),
  FOREIGN KEY (`id_lista`) REFERENCES `listas` (`id_lista`)
);