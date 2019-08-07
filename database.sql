CREATE DATABASE  IF NOT EXISTS `ionita` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ionita`;

CREATE TABLE tbl_usuarios
(
	id 			int primary key auto_increment NOT NULL,
	usuario     VARCHAR(120) NOT NULL,
	senha       VARCHAR(120) NOT NULL,
	nivel       int(1) NOT NULL
);

CREATE TABLE tbl_slides
(
	id 		int primary key auto_increment not null,
	nome 	VARCHAR(120) NOT NULL,
	link 	VARCHAR(255) NULL,
	img 	VARCHAR(255) NOT NULL,
	ativo 	int(1) NOT NULL
);

CREATE TABLE tbl_videos
(
	id_video int primary key auto_increment NOT NULL,
	titulo	 VARCHAR(255) NOT NULL,
	url      VARCHAR(255) NOT NULL,
	ativo    int(1) NOT NULL
);

CREATE TABLE tbl_servicos
(
	id		int primary key auto_increment NOT NULL,
	nome    VARCHAR(255) NOT NULL,
	img     VARCHAR(255) NOT NULL,
	descricao	TEXT NOT NULL,
	ativo       int(1) NOT NULL
);

CREATE TABLE tbl_informativos_img
(
	id_img	int primary key auto_increment NOT NULL,
	nome    VARCHAR(255) NOT NULL,
	ativo   int(1) NOT NULL
);

CREATE TABLE tbl_informativos
(
	id_info		int primary key auto_increment NOT NULL,
	titulo      VARCHAR(255) NOT NULL,
	descricao   TEXT NOT NULL,
	data_postagem   DATE NOT NULL,
	ativo       int(1) NOT NULL,
	id_img      int NULL
);

ALTER TABLE tbl_informativos
ADD FOREIGN KEY R_3 (id_img) REFERENCES tbl_informativos_img (id_img);


CREATE TABLE tbl_entrevistas
(
	id_entrevista	int primary key auto_increment NOT NULL,
	titulo          VARCHAR(255) NOT NULL,
	descricao       TEXT NOT NULL,
	ativo           int(1) NOT NULL,
	id_video        int NULL
);

ALTER TABLE tbl_entrevistas
ADD FOREIGN KEY R_2 (id_video) REFERENCES tbl_videos (id_video);


CREATE TABLE tbl_jurisprudencia_grupo
(
	id_grupo             int primary key auto_increment NOT NULL,
	nome                 VARCHAR(255) NOT NULL,
	ativo                int(1) NOT NULL
);

CREATE TABLE tbl_jurisprudencia
(
	id_jurisprudencia    int primary key auto_increment NOT NULL,
	nome                 VARCHAR(255) NOT NULL,
	descricao            TEXT NOT NULL,
	ativo                int(1) NOT NULL,
	id_grupo             int NULL
);


ALTER TABLE tbl_jurisprudencia
ADD FOREIGN KEY R_4 (id_grupo) REFERENCES tbl_jurisprudencia_grupo (id_grupo);


CREATE TABLE tbl_blog_cat
(
	id_cat	int primary key auto_increment NOT NULL,
	nome    VARCHAR(255) NOT NULL,
	ativo   int(1) NOT NULL
);

CREATE TABLE tbl_blog
(
	id_blog		int primary key auto_increment NOT NULL,
	nome        VARCHAR(255) NOT NULL,
	img 	VARCHAR(255) NOT NULL,
	descricao   TEXT NOT NULL,
	ativo       int(1) NOT NULL,
	destaque    int(1) NOT NULL,
	data_publicacao     DATE NOT NULL,
	id_cat      int NULL
);

ALTER TABLE tbl_blog
ADD FOREIGN KEY R_5 (id_cat) REFERENCES tbl_blog_cat (id_cat);



-------------------------------------------------------------------------------------------------------------------------------------











