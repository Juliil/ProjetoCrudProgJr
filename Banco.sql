CREATE DATABASE  IF NOT EXISTS `db_escola` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_escola`;

DROP TABLE IF EXISTS `tb_aluno`;

CREATE TABLE tb_aluno (
  id_aluno int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(64) NOT NULL,
  dt_nascimento timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  
  logradouro varchar(64) NOT NULL,
  numero int(11) NOT NULL,    
  bairro varchar(32) NOT NULL,
  cidade varchar(32) NOT NULL,
  estado varchar(32) NOT NULL,
  dt_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  cep int(11) NOT NULL,
  id_curso int(11) NOT NULL,
    
  PRIMARY KEY (id_aluno)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tb_curso`;

CREATE TABLE tb_curso (
  id_curso int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(64) NOT NULL,
  dt_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  
  id_professor int(11) NOT NULL,
    
  PRIMARY KEY (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tb_professor`;

CREATE TABLE tb_professor (
  id_professor int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(64) NOT NULL,
  dt_nascimento timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  dt_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,   
    
  PRIMARY KEY (id_professor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;