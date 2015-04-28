/*
Navicat MySQL Data Transfer

Source Server         : MySQL_Taller_III
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : proyhorario

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2015-04-24 10:42:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asignacion
-- ----------------------------
DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE `asignacion` (
  `nrcEE` varchar(5) NOT NULL DEFAULT '',
  `claveHor` varchar(50) NOT NULL DEFAULT '',
  `posicAsig` varchar(50) DEFAULT NULL,
  `horaAsig` int(11) DEFAULT NULL,
  `diaAsig` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`nrcEE`,`claveHor`),
  KEY `fk_Asig_Hor_1` (`claveHor`),
  CONSTRAINT `fk_Asig_EE_1` FOREIGN KEY (`nrcEE`) REFERENCES `ee` (`nrcEE`),
  CONSTRAINT `fk_Asig_Hor_1` FOREIGN KEY (`claveHor`) REFERENCES `horario` (`claveHor`)
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

-- ----------------------------
-- Table structure for carga
-- ----------------------------
DROP TABLE IF EXISTS `carga`;
CREATE TABLE `carga` (
  `numMtro` varchar(10) NOT NULL DEFAULT '',
  `nrc` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`numMtro`,`nrc`),
  KEY `fk_Carg_EE_1` (`nrc`),
  CONSTRAINT `fk_Carg_EE_1` FOREIGN KEY (`nrc`) REFERENCES `ee` (`nrcEE`),
  CONSTRAINT `fk_Carg_Mtro_1` FOREIGN KEY (`numMtro`) REFERENCES `maestro` (`numMtro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carga
-- ----------------------------

-- ----------------------------
-- Table structure for carrera
-- ----------------------------
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `codigoCarr` int(11) NOT NULL DEFAULT '0',
  `nombreCarr` varchar(60) DEFAULT NULL,
  `creditosCarr` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoCarr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carrera
-- ----------------------------

-- ----------------------------
-- Table structure for ee
-- ----------------------------
DROP TABLE IF EXISTS `ee`;
CREATE TABLE `ee` (
  `nrcEE` varchar(5) NOT NULL DEFAULT '',
  `codigoCarr` int(11) NOT NULL DEFAULT '0',
  `nombEE` varchar(50) DEFAULT NULL,
  `periodEE` varchar(30) DEFAULT NULL,
  `areaEE` varchar(30) DEFAULT NULL,
  `tipoEE` varchar(30) DEFAULT NULL,
  `hrsteoriaEE` int(11) DEFAULT NULL,
  `hrspractEE` int(11) DEFAULT NULL,
  `creditEE` int(11) DEFAULT NULL,
  PRIMARY KEY (`nrcEE`,`codigoCarr`),
  KEY `fk_EE_Carr_1` (`codigoCarr`),
  CONSTRAINT `fk_EE_Carr_1` FOREIGN KEY (`codigoCarr`) REFERENCES `carrera` (`codigoCarr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ee
-- ----------------------------

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
  CONSTRAINT `fk_Hor_aula_1` FOREIGN KEY (`numeroAula`) REFERENCES `aula` (`numeroAula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of horario
-- ----------------------------

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
