CREATE TABLE IF NOT EXISTS aluno_link (
  idlink int(11) NOT NULL,
  idaluno int(11) NOT NULL,
  PRIMARY KEY  (idlink,idaluno),
  KEY fk_link_has_aluno_aluno1 (idaluno)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE aluno_link
  ADD CONSTRAINT fk_link_has_aluno_aluno1 FOREIGN KEY (idaluno) REFERENCES aluno (idaluno) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_link_has_aluno_aluno1 FOREIGN KEY (idaluno) REFERENCES link (idlink) ON DELETE NO ACTION ON UPDATE NO ACTION;

SET FOREIGN_KEY_CHECKS=1;
