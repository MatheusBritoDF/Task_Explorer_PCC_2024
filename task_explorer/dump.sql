DROP DATABASE IF EXISTS db_task_explorer;

CREATE DATABASE db_task_explorer;
USE db_task_explorer;

CREATE TABLE usuarios (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(200) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  nome VARCHAR(100) NOT NULL,
  tipo_usuario ENUM('Usuário', 'Administrador') NOT NULL,
  PRIMARY KEY (id_usuario)
);

CREATE TABLE tasks (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  task_name VARCHAR(190),
  task_description VARCHAR(250),
  task_image VARCHAR(50),
  task_date DATE,
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE tbl_list (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45),
    list VARCHAR(255) NOT NULL,
    painel INT,
    id_task INT,
    FOREIGN KEY (id_task) REFERENCES tasks (id)
  );

CREATE TABLE cartoes (
  id_cartao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(45) NOT NULL,
  descricao VARCHAR(500),
  nivel_prioridade ENUM('ALTA', 'MÉDIA', 'BAIXA'),
  id_lista INT NOT NULL,
  FOREIGN KEY (id_lista) REFERENCES tbl_list (id)
);

INSERT INTO usuarios (id_usuario, email, senha, nome, tipo_usuario) VALUES (1, 'admin@email.com', '123456', 'Admin', 'Administrador');
INSERT INTO usuarios (id_usuario, email, senha, nome, tipo_usuario) VALUES (2, 'user01@email.com', '123456', 'User01', 'Usuário');
INSERT INTO usuarios (id_usuario, email, senha, nome, tipo_usuario) VALUES (3, 'user02@email.com', '123456', 'User02', 'Usuário');

INSERT INTO tasks (id, task_name, task_description, task_image, task_date) VALUES (1, 'Engenharia', 'Quadro Kanban sobre Engenharia', 'mohammad-alizade-62t_kKa2YlA-unsplash.jpg', '');
INSERT INTO tasks (id, task_name, task_description, task_image, task_date) VALUES (2, 'Desenvolvimento de Software', 'Quadro Kanban sobre o desenvolvimento de um software de inteligência artificial (IA)', 'christian-lue-QcJ1XCc3gJo-unsplash.jpg', '');
INSERT INTO tasks (id, task_name, task_description, task_image, task_date) VALUES (3, 'Medicina', 'Quadro Kanban com dados levantados do número de médicos contratados', 'bailey-zindel-NRQV-hBF10M-unsplash.jpg', '');