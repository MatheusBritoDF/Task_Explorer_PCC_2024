DROP DATABASE IF EXISTS db_task_explorer;

CREATE DATABASE db_task_explorer;
USE db_task_explorer;

CREATE TABLE `usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `tipo_usuario` ENUM('Usuário', 'Administrador') NOT NULL,
  PRIMARY KEY (`id_usuario`));


CREATE TABLE `kanban` (
  `id_kanban` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(60) NOT NULL,
  `visibilidade` ENUM('Área de Trabalho', 'Público', 'Privado') NOT NULL,
  `id_usuario` INT NULL,
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

INSERT INTO `usuarios` (id_usuario, email, senha, nome, tipo_usuario) VALUES (1, 'admin@email.com', '123456', 'Admin', 'Administrador');
INSERT INTO `usuarios` (id_usuario, email, senha, nome, tipo_usuario) VALUES (2, 'user01@email.com', '123456', 'User01', 'Usuário');
INSERT INTO `usuarios` (id_usuario, email, senha, nome, tipo_usuario) VALUES (3, 'user02@email.com', '123456', 'User02', 'Usuário');


INSERT INTO `kanban` (id_kanban, titulo, visibilidade, id_usuario, tela_fundo) VALUES (1, 'Template_01', 'Área de Trabalho', NULL, 'https://images.unsplash.com/photo-1714383524948-ebc87c14c0f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0NHx8fGVufDB8fHx8fA%3D%3D');
INSERT INTO `kanban` (id_kanban, titulo, visibilidade, id_usuario, tela_fundo) VALUES (2, 'Template_02', 'Área de Trabalho', NULL, 'https://images.unsplash.com/photo-1714591755376-349fd01b41cb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2MHx8fGVufDB8fHx8fA%3D%3D');
INSERT INTO `kanban` (id_kanban, titulo, visibilidade, id_usuario, tela_fundo) VALUES (3, 'Template_03', 'Área de Trabalho', NULL, 'https://images.unsplash.com/photo-1714833890840-a3c4f446c194?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw2OHx8fGVufDB8fHx8fA%3D%3D');
