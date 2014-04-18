SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


-- Banco de Dados: `cadastro_alunos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1' COMMENT 'Normal (1) e Administrador (2)',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `cadastro` datetime NOT NULL,
  `idaluno` int(10) NOT NULL 
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `niveis` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

ALTER TABLE usuarios 
ADD CONSTRAINT fk_usuarios_has_aluno FOREIGN KEY (idaluno) REFERENCES aluno (idaluno) ON DELETE NO ACTION ON UPDATE NO ACTION;

