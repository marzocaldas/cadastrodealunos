CREATE DATABASE IF NOT EXISTS cadastro_alunos;
USE cadastro_alunos;
SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP TABLE IF EXISTS aluno;
CREATE TABLE IF NOT EXISTS aluno (
  idaluno int(11) NOT NULL auto_increment,
  nomealuno varchar(100) NOT NULL,
  dcendereco varchar(200) NOT NULL,
  celular int(11) NOT NULL,
  dtinicio date NOT NULL,
  motivo text,
  txcomentario text,
  dtcadastro date NOT NULL,
  PRIMARY KEY  (idaluno)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS atividade;
CREATE TABLE IF NOT EXISTS atividade (
  idatividade int(11) NOT NULL auto_increment,
  nomeatividade varchar(50) NOT NULL,
  PRIMARY KEY  (idatividade)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

DROP TABLE IF EXISTS atividade_aluno;
CREATE TABLE IF NOT EXISTS atividade_aluno (
  idatividade int(11) NOT NULL,
  idaluno int(11) NOT NULL,
  PRIMARY KEY  (idatividade,idaluno),
  KEY fk_atividade_has_aluno_aluno1 (idaluno)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE atividade_aluno
  ADD CONSTRAINT fk_atividade_has_aluno_aluno1 FOREIGN KEY (idaluno) REFERENCES aluno (idaluno) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_atividade_has_aluno_aluno1 FOREIGN KEY (idaluno) REFERENCES atividade (idatividade) ON DELETE NO ACTION ON UPDATE NO ACTION;

SET FOREIGN_KEY_CHECKS=1;
