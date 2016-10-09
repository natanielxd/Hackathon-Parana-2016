-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.16-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5119
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela hackathon2016.linha
CREATE TABLE IF NOT EXISTS `linha` (
  `idlinha` int(11) NOT NULL AUTO_INCREMENT,
  `linha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idlinha`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela hackathon2016.linha: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `linha` DISABLE KEYS */;
INSERT INTO `linha` (`idlinha`, `linha`) VALUES
	(1, '469 - CENTRO POLITÉCNICO'),
	(2, '505 - BOQUEIRÃO / C. CÍVICO'),
	(3, '210 - CIC/CABRAL'),
	(4, '216 - CABRAL / PORTÃO'),
	(5, '201 - BOM RETIRO / CABRAL');
/*!40000 ALTER TABLE `linha` ENABLE KEYS */;

-- Copiando estrutura para tabela hackathon2016.linha_geo
CREATE TABLE IF NOT EXISTS `linha_geo` (
  `idlinha_geo` int(11) NOT NULL AUTO_INCREMENT,
  `cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idlinha` int(11) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `informacao` varchar(255) DEFAULT NULL COMMENT 'Lotado, Vazio, Normal',
  `situacao` char(1) DEFAULT 'A',
  PRIMARY KEY (`idlinha_geo`),
  KEY `idlinha` (`idlinha`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela hackathon2016.linha_geo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `linha_geo` DISABLE KEYS */;
INSERT INTO `linha_geo` (`idlinha_geo`, `cadastro`, `idlinha`, `latitude`, `longitude`, `informacao`, `situacao`) VALUES
	(1, '2016-10-08 18:27:02', 1, '-25.3490948', '-49.1935856', '#BusaoLotado', 'A'),
	(2, '2016-10-08 18:27:08', 1, '-25.7790948', '-48.1935856', '#SentadoNoBusao', 'A'),
	(3, '2016-10-08 19:11:49', 4, '4546545', '121231321', '#BusaoLivreTop', 'A');
/*!40000 ALTER TABLE `linha_geo` ENABLE KEYS */;

-- Copiando estrutura para tabela hackathon2016.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `situacao` char(50) DEFAULT 'A',
  PRIMARY KEY (`idusuario`,`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela hackathon2016.usuario: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `login`, `senha`, `situacao`) VALUES
	(1, 'marcos_santos', 'b38d5524d1ccfc11b182e9bae3e20657', 'A'),
	(2, 'beto_richa', '1334fcee3c919b0725b7f2766afbbe85', 'A'),
	(3, 'carlos', '1334fcee3c919b0725b7f2766afbbe85', 'A'),
	(4, 'carss', '1334fcee3c919b0725b7f2766afbbe85', 'A'),
	(5, 'felipe', 'a28f05f5f45fe2d8a900736c8935fe44', 'A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
