/*
Navicat MySQL Data Transfer

Source Server         : MYSQL-FEI
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hourhand

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-05-16 17:09:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asignacion
-- ----------------------------
DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE `asignacion` (
  `nrcEE` varchar(5) NOT NULL DEFAULT '',
  `claveHor` varchar(50) NOT NULL DEFAULT '',
  `posicAsig` varchar(50) NOT NULL,
  `horaAsig` int(11) DEFAULT NULL,
  `diaAsig` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`nrcEE`,`claveHor`,`posicAsig`),
  KEY `fk_Asig_Hor_1` (`claveHor`),
  CONSTRAINT `fk_Asig_EE_1` FOREIGN KEY (`nrcEE`) REFERENCES `ee` (`nrcEE`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Asig_Hor_1` FOREIGN KEY (`claveHor`) REFERENCES `horario` (`claveHor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of asignacion
-- ----------------------------

-- ----------------------------
-- Table structure for aula
-- ----------------------------
DROP TABLE IF EXISTS `aula`;
CREATE TABLE `aula` (
  `numeroAula` varchar(30) NOT NULL DEFAULT '',
  `capacidAula` int(11) DEFAULT NULL,
  PRIMARY KEY (`numeroAula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aula
-- ----------------------------
INSERT INTO `aula` VALUES ('102', '12');
INSERT INTO `aula` VALUES ('103', '20');
INSERT INTO `aula` VALUES ('CC2', '25');
INSERT INTO `aula` VALUES ('CC3', '23');

-- ----------------------------
-- Table structure for carga
-- ----------------------------
DROP TABLE IF EXISTS `carga`;
CREATE TABLE `carga` (
  `numMtro` varchar(10) NOT NULL DEFAULT '',
  `nrc` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`numMtro`,`nrc`),
  KEY `fk_Carg_EE_1` (`nrc`),
  CONSTRAINT `fk_Carg_EE_1` FOREIGN KEY (`nrc`) REFERENCES `ee` (`nrcEE`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Carg_Mtro_1` FOREIGN KEY (`numMtro`) REFERENCES `maestro` (`numMtro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carga
-- ----------------------------
INSERT INTO `carga` VALUES ('124', '11115');
INSERT INTO `carga` VALUES ('124', '12345');

-- ----------------------------
-- Table structure for carrera
-- ----------------------------
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `codigoCarr` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCarr` varchar(60) DEFAULT NULL,
  `creditosCarr` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoCarr`)
) ENGINE=InnoDB AUTO_INCREMENT=435 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carrera
-- ----------------------------
INSERT INTO `carrera` VALUES ('1', 'Tecnologias', '300');
INSERT INTO `carrera` VALUES ('3', 'Informática', '370');
INSERT INTO `carrera` VALUES ('23', 'Redes', '289');
INSERT INTO `carrera` VALUES ('90', 'Geografía', '209');
INSERT INTO `carrera` VALUES ('434', 'Estadistica', '390');

-- ----------------------------
-- Table structure for ee
-- ----------------------------
DROP TABLE IF EXISTS `ee`;
CREATE TABLE `ee` (
  `nrcEE` varchar(5) NOT NULL DEFAULT '',
  `codigoCarr` int(11) NOT NULL AUTO_INCREMENT,
  `nombEE` varchar(50) DEFAULT NULL,
  `periodEE` varchar(30) DEFAULT NULL,
  `areaEE` varchar(30) DEFAULT NULL,
  `tipoEE` varchar(30) DEFAULT NULL,
  `hrsteoriaEE` int(11) DEFAULT NULL,
  `hrspractEE` int(11) DEFAULT NULL,
  `creditEE` int(11) DEFAULT NULL,
  PRIMARY KEY (`nrcEE`,`codigoCarr`),
  KEY `fk_EE_Carr_1` (`codigoCarr`),
  CONSTRAINT `fk_EE_Carr_1` FOREIGN KEY (`codigoCarr`) REFERENCES `carrera` (`codigoCarr`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ee
-- ----------------------------
INSERT INTO `ee` VALUES ('11111', '90', 'Lògica', 'FEB-JUL', 'Iniciacion a la disciplina', 'normal', '2', '3', '12');
INSERT INTO `ee` VALUES ('11112', '90', 'Administraciòn', '2008', 'Bàsica', 'normal', '1', '2', '12');
INSERT INTO `ee` VALUES ('11113', '90', 'Ingles', '2008', 'Bàsica', 'normal', '2', '1', '12');
INSERT INTO `ee` VALUES ('11114', '90', 'Lectura', '2008', 'Bàsica', 'normal', '3', '3', '12');
INSERT INTO `ee` VALUES ('11115', '90', 'Algoritmos', '2008', 'Bàsica', 'normal', '2', '1', '12');
INSERT INTO `ee` VALUES ('12345', '90', 'Inteligencia artificial', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '3', '8');

-- ----------------------------
-- Table structure for horario
-- ----------------------------
DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `numeroAula` varchar(50) NOT NULL,
  `claveHor` varchar(50) NOT NULL DEFAULT '',
  `hrEHorario` int(11) DEFAULT NULL,
  `hrSHorario` int(11) DEFAULT NULL,
  PRIMARY KEY (`numeroAula`,`claveHor`),
  KEY `claveHor` (`claveHor`),
  CONSTRAINT `fk_Hor_aula_1` FOREIGN KEY (`numeroAula`) REFERENCES `aula` (`numeroAula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of horario
-- ----------------------------
INSERT INTO `horario` VALUES ('102', '102HOR', '7', '20');
INSERT INTO `horario` VALUES ('103', '103HOR', '7', '20');
INSERT INTO `horario` VALUES ('CC2', 'CC2HOR', '7', '20');
INSERT INTO `horario` VALUES ('CC3', 'CC3HOR', '7', '20');

-- ----------------------------
-- Table structure for maestro
-- ----------------------------
DROP TABLE IF EXISTS `maestro`;
CREATE TABLE `maestro` (
  `numMtro` varchar(10) NOT NULL DEFAULT '',
  `nombMtro` varchar(60) DEFAULT NULL,
  `tipoMtro` varchar(20) DEFAULT NULL,
  `horasMtro` int(11) DEFAULT NULL,
  PRIMARY KEY (`numMtro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of maestro
-- ----------------------------
INSERT INTO `maestro` VALUES ('123', 'Angel Juan', 'Completo', '12');
INSERT INTO `maestro` VALUES ('124', 'Xavier Limon', 'Medio tiempo', '6');
DROP TRIGGER IF EXISTS `aula_create`;
DELIMITER ;;
CREATE TRIGGER `aula_create` AFTER INSERT ON `aula` FOR EACH ROW BEGIN
    INSERT INTO horario
     VALUES(
				NEW.numeroAula,
        CONCAT(NEW.numeroAula, 'HOR'),
        7,
				20); 
END
;;
DELIMITER ;
