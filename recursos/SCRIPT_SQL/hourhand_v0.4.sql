/*
Navicat MySQL Data Transfer

Source Server         : MYSQL-FEI
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hourhand

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-09-23 15:50:10
*/

CREATE DATABASE hourhand;
USE hourhand;

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
INSERT INTO `asignacion` VALUES ('12001', '106HOR', '1', '11', 'martes');
INSERT INTO `asignacion` VALUES ('12001', '106HOR', '2', '12', 'martes');
INSERT INTO `asignacion` VALUES ('12001', '106HOR', '3', '10', 'jueves');
INSERT INTO `asignacion` VALUES ('12001', '106HOR', '4', '11', 'miercoles');
INSERT INTO `asignacion` VALUES ('12001', '106HOR', '5', '12', 'miercoles');
INSERT INTO `asignacion` VALUES ('12002', '106HOR', '1', '16', 'viernes');
INSERT INTO `asignacion` VALUES ('12002', '106HOR', '2', '15', 'viernes');
INSERT INTO `asignacion` VALUES ('12002', '106HOR', '3', '16', 'miercoles');
INSERT INTO `asignacion` VALUES ('12002', '106HOR', '4', '18', 'martes');
INSERT INTO `asignacion` VALUES ('12002', '106HOR', '5', '17', 'martes');
INSERT INTO `asignacion` VALUES ('16000', '106HOR', '1', '16', 'jueves');
INSERT INTO `asignacion` VALUES ('16000', '106HOR', '2', '16', 'lunes');
INSERT INTO `asignacion` VALUES ('16000', '106HOR', '3', '16', 'martes');
INSERT INTO `asignacion` VALUES ('16000', '106HOR', '4', '15', 'lunes');
INSERT INTO `asignacion` VALUES ('16000', '106HOR', '5', '15', 'jueves');
INSERT INTO `asignacion` VALUES ('16000', '106HOR', '6', '15', 'martes');
INSERT INTO `asignacion` VALUES ('16011', '106HOR', '1', '7', 'miercoles');
INSERT INTO `asignacion` VALUES ('16011', '106HOR', '2', '8', 'miercoles');
INSERT INTO `asignacion` VALUES ('16011', '106HOR', '3', '9', 'viernes');
INSERT INTO `asignacion` VALUES ('16011', '106HOR', '4', '11', 'jueves');
INSERT INTO `asignacion` VALUES ('16011', '106HOR', '5', '10', 'viernes');
INSERT INTO `asignacion` VALUES ('16011', '106HOR', '6', '12', 'jueves');
INSERT INTO `asignacion` VALUES ('17000', '106HOR', '1', '7', 'martes');
INSERT INTO `asignacion` VALUES ('17000', '106HOR', '2', '8', 'lunes');
INSERT INTO `asignacion` VALUES ('17000', '106HOR', '3', '7', 'lunes');
INSERT INTO `asignacion` VALUES ('17000', '106HOR', '4', '8', 'martes');
INSERT INTO `asignacion` VALUES ('17000', '106HOR', '5', '7', 'jueves');
INSERT INTO `asignacion` VALUES ('17000', '106HOR', '6', '8', 'jueves');
INSERT INTO `asignacion` VALUES ('17011', '106HOR', '1', '14', 'jueves');
INSERT INTO `asignacion` VALUES ('17011', '106HOR', '2', '14', 'martes');
INSERT INTO `asignacion` VALUES ('17011', '106HOR', '3', '14', 'lunes');
INSERT INTO `asignacion` VALUES ('17011', '106HOR', '4', '13', 'jueves');
INSERT INTO `asignacion` VALUES ('17011', '106HOR', '5', '13', 'lunes');
INSERT INTO `asignacion` VALUES ('17011', '106HOR', '6', '13', 'martes');
INSERT INTO `asignacion` VALUES ('18000', '106HOR', '1', '9', 'lunes');
INSERT INTO `asignacion` VALUES ('18000', '106HOR', '2', '9', 'jueves');
INSERT INTO `asignacion` VALUES ('18000', '106HOR', '3', '10', 'lunes');
INSERT INTO `asignacion` VALUES ('18000', '106HOR', '4', '9', 'miercoles');
INSERT INTO `asignacion` VALUES ('18000', '106HOR', '5', '10', 'miercoles');
INSERT INTO `asignacion` VALUES ('18011', '106HOR', '1', '15', 'miercoles');
INSERT INTO `asignacion` VALUES ('18011', '106HOR', '2', '14', 'miercoles');
INSERT INTO `asignacion` VALUES ('18011', '106HOR', '3', '13', 'miercoles');
INSERT INTO `asignacion` VALUES ('18011', '106HOR', '4', '13', 'viernes');
INSERT INTO `asignacion` VALUES ('18011', '106HOR', '5', '14', 'viernes');
INSERT INTO `asignacion` VALUES ('19000', '106HOR', '1', '9', 'martes');
INSERT INTO `asignacion` VALUES ('19000', '106HOR', '2', '11', 'lunes');
INSERT INTO `asignacion` VALUES ('19000', '106HOR', '3', '12', 'lunes');
INSERT INTO `asignacion` VALUES ('19000', '106HOR', '4', '10', 'martes');
INSERT INTO `asignacion` VALUES ('19000', '106HOR', '5', '11', 'viernes');
INSERT INTO `asignacion` VALUES ('19000', '106HOR', '6', '12', 'viernes');
INSERT INTO `asignacion` VALUES ('19011', '106HOR', '1', '17', 'viernes');
INSERT INTO `asignacion` VALUES ('19011', '106HOR', '2', '18', 'miercoles');
INSERT INTO `asignacion` VALUES ('19011', '106HOR', '3', '17', 'miercoles');
INSERT INTO `asignacion` VALUES ('19011', '106HOR', '4', '17', 'lunes');
INSERT INTO `asignacion` VALUES ('19011', '106HOR', '5', '18', 'lunes');
INSERT INTO `asignacion` VALUES ('19011', '106HOR', '6', '18', 'viernes');
INSERT INTO `asignacion` VALUES ('69412', '103HOR', '1', '13', 'lunes');
INSERT INTO `asignacion` VALUES ('69412', '103HOR', '2', '14', 'lunes');
INSERT INTO `asignacion` VALUES ('69412', '103HOR', '3', '13', 'jueves');
INSERT INTO `asignacion` VALUES ('69412', '103HOR', '4', '12', 'jueves');
INSERT INTO `asignacion` VALUES ('69412', '103HOR', '5', '13', 'miercoles');
INSERT INTO `asignacion` VALUES ('69412', '103HOR', '6', '14', 'miercoles');
INSERT INTO `asignacion` VALUES ('69413', '103HOR', '1', '9', 'lunes');
INSERT INTO `asignacion` VALUES ('69413', '103HOR', '2', '10', 'lunes');
INSERT INTO `asignacion` VALUES ('69413', '103HOR', '3', '9', 'martes');
INSERT INTO `asignacion` VALUES ('69413', '103HOR', '4', '12', 'miercoles');
INSERT INTO `asignacion` VALUES ('69413', '103HOR', '5', '10', 'martes');
INSERT INTO `asignacion` VALUES ('69416', '103HOR', '1', '9', 'jueves');
INSERT INTO `asignacion` VALUES ('69416', '103HOR', '2', '12', 'viernes');
INSERT INTO `asignacion` VALUES ('69416', '103HOR', '3', '11', 'lunes');
INSERT INTO `asignacion` VALUES ('69416', '103HOR', '4', '11', 'viernes');
INSERT INTO `asignacion` VALUES ('69416', '103HOR', '5', '12', 'lunes');
INSERT INTO `asignacion` VALUES ('69421', '103HOR', '1', '7', 'martes');
INSERT INTO `asignacion` VALUES ('69421', '103HOR', '2', '8', 'martes');
INSERT INTO `asignacion` VALUES ('69421', '103HOR', '3', '11', 'miercoles');
INSERT INTO `asignacion` VALUES ('69421', '103HOR', '4', '7', 'viernes');
INSERT INTO `asignacion` VALUES ('69421', '103HOR', '5', '8', 'viernes');
INSERT INTO `asignacion` VALUES ('69425', '103HOR', '1', '11', 'martes');
INSERT INTO `asignacion` VALUES ('69425', '103HOR', '2', '12', 'martes');
INSERT INTO `asignacion` VALUES ('69425', '103HOR', '3', '7', 'jueves');
INSERT INTO `asignacion` VALUES ('69425', '103HOR', '4', '8', 'jueves');
INSERT INTO `asignacion` VALUES ('69429', '103HOR', '2', '9', 'viernes');
INSERT INTO `asignacion` VALUES ('69429', '103HOR', '3', '10', 'jueves');
INSERT INTO `asignacion` VALUES ('69429', '103HOR', '5', '10', 'viernes');
INSERT INTO `asignacion` VALUES ('69429', '103HOR', '6', '11', 'jueves');
INSERT INTO `asignacion` VALUES ('69429', 'CC2HOR', '1', '9', 'miercoles');
INSERT INTO `asignacion` VALUES ('69429', 'CC2HOR', '4', '10', 'miercoles');
INSERT INTO `asignacion` VALUES ('69475', '103HOR', '1', '18', 'miercoles');
INSERT INTO `asignacion` VALUES ('69475', '103HOR', '2', '15', 'lunes');
INSERT INTO `asignacion` VALUES ('69475', '103HOR', '3', '17', 'miercoles');
INSERT INTO `asignacion` VALUES ('69475', '103HOR', '4', '16', 'martes');
INSERT INTO `asignacion` VALUES ('69475', '103HOR', '5', '15', 'martes');
INSERT INTO `asignacion` VALUES ('69475', '103HOR', '6', '16', 'lunes');
INSERT INTO `asignacion` VALUES ('69476', '103HOR', '1', '19', 'jueves');
INSERT INTO `asignacion` VALUES ('69476', '103HOR', '2', '20', 'martes');
INSERT INTO `asignacion` VALUES ('69476', '103HOR', '3', '19', 'martes');
INSERT INTO `asignacion` VALUES ('69476', '103HOR', '4', '15', 'miercoles');
INSERT INTO `asignacion` VALUES ('69476', '103HOR', '5', '16', 'miercoles');
INSERT INTO `asignacion` VALUES ('69477', '103HOR', '1', '18', 'viernes');
INSERT INTO `asignacion` VALUES ('69477', '103HOR', '2', '17', 'viernes');
INSERT INTO `asignacion` VALUES ('69477', '103HOR', '3', '17', 'jueves');
INSERT INTO `asignacion` VALUES ('69477', '103HOR', '4', '17', 'lunes');
INSERT INTO `asignacion` VALUES ('69477', '103HOR', '5', '18', 'lunes');
INSERT INTO `asignacion` VALUES ('69478', '103HOR', '1', '18', 'jueves');
INSERT INTO `asignacion` VALUES ('69478', '103HOR', '2', '18', 'martes');
INSERT INTO `asignacion` VALUES ('69478', '103HOR', '3', '19', 'lunes');
INSERT INTO `asignacion` VALUES ('69478', '103HOR', '4', '17', 'martes');
INSERT INTO `asignacion` VALUES ('69478', '103HOR', '5', '20', 'lunes');
INSERT INTO `asignacion` VALUES ('70151', 'CC1HOR', '1', '13', 'lunes');
INSERT INTO `asignacion` VALUES ('70151', 'CC1HOR', '2', '13', 'martes');
INSERT INTO `asignacion` VALUES ('70151', 'CC1HOR', '3', '14', 'lunes');
INSERT INTO `asignacion` VALUES ('70151', 'CC1HOR', '4', '13', 'miercoles');
INSERT INTO `asignacion` VALUES ('70151', 'CC1HOR', '5', '14', 'martes');
INSERT INTO `asignacion` VALUES ('70151', 'CC1HOR', '6', '14', 'miercoles');
INSERT INTO `asignacion` VALUES ('70156', 'CC1HOR', '2', '18', 'viernes');
INSERT INTO `asignacion` VALUES ('70156', 'CC1HOR', '3', '15', 'miercoles');
INSERT INTO `asignacion` VALUES ('70156', 'CC1HOR', '4', '17', 'viernes');
INSERT INTO `asignacion` VALUES ('70156', 'CC1HOR', '6', '16', 'miercoles');
INSERT INTO `asignacion` VALUES ('70156', 'CC2HOR', '1', '15', 'lunes');
INSERT INTO `asignacion` VALUES ('70156', 'CC2HOR', '5', '16', 'lunes');
INSERT INTO `asignacion` VALUES ('70159', '111HOR', '1', '16', 'miercoles');
INSERT INTO `asignacion` VALUES ('70159', '111HOR', '2', '15', 'miercoles');
INSERT INTO `asignacion` VALUES ('70159', '111HOR', '3', '16', 'martes');
INSERT INTO `asignacion` VALUES ('70159', '111HOR', '4', '15', 'martes');
INSERT INTO `asignacion` VALUES ('71931', '103HOR', '2', '13', 'viernes');
INSERT INTO `asignacion` VALUES ('71931', '103HOR', '3', '14', 'viernes');
INSERT INTO `asignacion` VALUES ('71931', '111HOR', '4', '13', 'jueves');
INSERT INTO `asignacion` VALUES ('71931', '111HOR', '6', '14', 'jueves');
INSERT INTO `asignacion` VALUES ('71931', 'CC2HOR', '1', '13', 'miercoles');
INSERT INTO `asignacion` VALUES ('71931', 'CC2HOR', '5', '14', 'miercoles');
INSERT INTO `asignacion` VALUES ('71934', 'SALON6HOR', '1', '20', 'viernes');
INSERT INTO `asignacion` VALUES ('71934', 'SALON6HOR', '2', '19', 'viernes');
INSERT INTO `asignacion` VALUES ('71934', 'SALON6HOR', '3', '20', 'jueves');
INSERT INTO `asignacion` VALUES ('71934', 'SALON6HOR', '4', '20', 'miercoles');
INSERT INTO `asignacion` VALUES ('71934', 'SALON6HOR', '5', '19', 'miercoles');

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
INSERT INTO `aula` VALUES ('103', '34');
INSERT INTO `aula` VALUES ('104', '30');
INSERT INTO `aula` VALUES ('105', '30');
INSERT INTO `aula` VALUES ('106', '30');
INSERT INTO `aula` VALUES ('111', '30');
INSERT INTO `aula` VALUES ('CC1', '30');
INSERT INTO `aula` VALUES ('CC2', '30');
INSERT INTO `aula` VALUES ('SALON6', '30');

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
INSERT INTO `carga` VALUES ('S12011268', '12001');
INSERT INTO `carga` VALUES ('S12011271', '16000');
INSERT INTO `carga` VALUES ('S12011269', '17000');
INSERT INTO `carga` VALUES ('S12011268', '18000');
INSERT INTO `carga` VALUES ('S12011272', '18011');
INSERT INTO `carga` VALUES ('S12011266', '19000');
INSERT INTO `carga` VALUES ('S12011270', '19011');
INSERT INTO `carga` VALUES ('S12011260', '69412');
INSERT INTO `carga` VALUES ('S12011261', '69413');
INSERT INTO `carga` VALUES ('S12011265', '69416');
INSERT INTO `carga` VALUES ('S12011267', '69421');
INSERT INTO `carga` VALUES ('S12011258', '69425');
INSERT INTO `carga` VALUES ('S12011266', '69429');
INSERT INTO `carga` VALUES ('S12011260', '69475');
INSERT INTO `carga` VALUES ('S12011261', '69476');
INSERT INTO `carga` VALUES ('S12011259', '69479');
INSERT INTO `carga` VALUES ('S12011264', '70159');

-- ----------------------------
-- Table structure for carrera
-- ----------------------------
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `codigoCarr` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCarr` varchar(60) DEFAULT NULL,
  `creditosCarr` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoCarr`)
) ENGINE=InnoDB AUTO_INCREMENT=21213 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carrera
-- ----------------------------
INSERT INTO `carrera` VALUES ('21212', 'Tecnologías computacionales', '350');

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
) ENGINE=InnoDB AUTO_INCREMENT=21213 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ee
-- ----------------------------
INSERT INTO `ee` VALUES ('10001', '21212', 'Inglés I', 'FEB-JUL', 'Básica General', 'Obligatoria', '0', '6', '6');
INSERT INTO `ee` VALUES ('11000', '21212', 'Organización de Computadoras', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('12000', '21212', 'Bases de Datos', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('12001', '21212', 'Bases de Datos Avanzadas', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('12002', '21212', 'Bases de Datos Avanzadas', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('13000', '21212', 'Matemáticas Discretas', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('14000', '21212', 'Sistemas Operativos', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('15000', '21212', 'Estructuras de Datos', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('16000', '21212', 'Redes', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('16011', '21212', 'Redes', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('17000', '21212', 'Ingeniería de Software', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('17001', '21212', 'Metodología de Desarrollo', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('17011', '21212', 'Ingeniería de Software', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('18000', '21212', 'Sistemas Inteligentes', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('18011', '21212', 'Sistemas Inteligentes', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('19000', '21212', 'Programación Avanzada', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('19011', '21212', 'Programación Avanzada', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('21000', '21212', 'Administración de Servidores', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('22000', '21212', 'Sistemas Web', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('23000', '21212', 'Habilidades Directivas', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('24000', '21212', 'Interacción Humano Computadora', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('25000', '21212', 'Ética y Legislación Informática', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '1', '7');
INSERT INTO `ee` VALUES ('26000', '21212', 'Gestión de Proyectos de TI', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('27000', '21212', 'Tecnologías Web', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('28000', '21212', 'Tecnologías Para la integración de Soluciones', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '3', '8');
INSERT INTO `ee` VALUES ('29000', '21212', 'Desarrollo Móvil', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('31000', '21212', 'Servicio Social', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '0', '0', '12');
INSERT INTO `ee` VALUES ('32000', '21212', 'Seguridad', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('33000', '21212', 'Proyecto Integrador', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '3', '1', '7');
INSERT INTO `ee` VALUES ('34000', '21212', 'Experiencia Recepcional', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '0', '0', '12');
INSERT INTO `ee` VALUES ('35000', '21212', 'Acreditación del Idioma Inglés', 'FEB-JUL', 'Iniciación  a la Diciplina', 'Obligatoria', '0', '0', '6');
INSERT INTO `ee` VALUES ('36000', '21212', 'Servicios de Virtualización', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('37000', '21212', 'Admón. de Proyectos de Software', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('38000', '21212', 'Bases de Datos No Convecionales', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('39000', '21212', 'Graficación', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('40000', '21212', 'Tecnologías de la Información para la Innovación', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '1', '7');
INSERT INTO `ee` VALUES ('41000', '21212', 'Diseño de Interacciones', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('42000', '21212', 'Cómputo Sustentable', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('43000', '21212', 'Ingeniería de Software Emergente', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('44000', '21212', 'Administración de Bases de Datos', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('45000', '21212', 'Interfaces de Usuario Avanzadas', 'FEB-JUL', 'Terminal', 'Optativa', '2', '2', '6');
INSERT INTO `ee` VALUES ('50000', '21212', 'Habilidades del Pensamiento Crítico y Creativo', 'FEB-JUL', 'Básica General', 'Obligatoria', '2', '2', '6');
INSERT INTO `ee` VALUES ('69412', '21212', 'Inglés II', 'FEB-JUL', 'Básica General', 'Obligatoria', '0', '6', '6');
INSERT INTO `ee` VALUES ('69413', '21212', 'Metodología de la Investigación', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('69416', '21212', 'Algebra Lineal Para Computación', 'FEB-JUL', 'Básica General', 'Obligatoria', '2', '3', '7');
INSERT INTO `ee` VALUES ('69421', '21212', 'Probabilidad y Estadistica para Computación', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('69425', '21212', 'L. y R. a Través del A. del M. C.', 'FEB-JUL', 'Básica General', 'Obligatoria', '2', '2', '6');
INSERT INTO `ee` VALUES ('69429', '21212', 'Programación', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '3', '9');
INSERT INTO `ee` VALUES ('69475', '21212', 'Inglés II', 'FEB-JUL', 'Básica General', 'Obligatoria', '0', '6', '6');
INSERT INTO `ee` VALUES ('69476', '21212', 'Metodología de la Investigación', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('69477', '21212', 'Algebra Lineal Para Computación', 'FEB-JUL', 'Básica General', 'Obligatoria', '2', '3', '7');
INSERT INTO `ee` VALUES ('69478', '21212', 'Probabilidad y Estadistica para Computación', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '2', '8');
INSERT INTO `ee` VALUES ('69479', '21212', 'L. y R. a Través del A. del M. C.', 'FEB-JUL', 'Básica General', 'Obligatoria', '2', '2', '6');
INSERT INTO `ee` VALUES ('70151', '21212', 'Computación Básica', 'FEB-JUL', 'Básica General', 'Obligatoria', '0', '6', '6');
INSERT INTO `ee` VALUES ('70156', '21212', 'Computación Básica', 'FEB-JUL', 'Básica General', 'Obligatoria', '0', '6', '6');
INSERT INTO `ee` VALUES ('70159', '21212', 'L. y R. a Través del A. del M. C.', 'FEB-JUL', 'Básica General', 'Obligatoria', '2', '2', '6');
INSERT INTO `ee` VALUES ('71931', '21212', 'Introducción a la Programación', 'FEB-JUL', 'Básica General', 'Obligatoria', '2', '4', '8');
INSERT INTO `ee` VALUES ('71934', '21212', 'Fundamentos de Matemáticas', 'FEB-JUL', 'Básica General', 'Obligatoria', '3', '2', '8');

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
INSERT INTO `horario` VALUES ('103', '103HOR', '7', '20');
INSERT INTO `horario` VALUES ('104', '104HOR', '7', '20');
INSERT INTO `horario` VALUES ('105', '105HOR', '7', '20');
INSERT INTO `horario` VALUES ('106', '106HOR', '7', '20');
INSERT INTO `horario` VALUES ('111', '111HOR', '7', '20');
INSERT INTO `horario` VALUES ('CC1', 'CC1HOR', '7', '20');
INSERT INTO `horario` VALUES ('CC2', 'CC2HOR', '7', '20');
INSERT INTO `horario` VALUES ('SALON6', 'SALON6HOR', '7', '20');

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
INSERT INTO `maestro` VALUES ('S12011258', 'García Araujo Maria', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011259', 'Dominguez Mejía Claudia', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011260', 'Lopez Peralda Dora Emilia ', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011261', 'Garcia Zamora Maria Esther', 'Por contratp', '5');
INSERT INTO `maestro` VALUES ('S12011262', 'Ortiz Sedano Adolfo ', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011263', 'Delgado Ramirez Atanasio Hermilo', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011264', 'Barradas Garcìa Ma. Eugenia ', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011265', 'Escalante Vega Juana Elisa', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011266', 'Mezura Godoy Carmen', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011267', 'Carmona Garcìa Maribel', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011268', 'Benitez Guerrero Edgar Ivan', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011269', 'Castañeda Sabchez Fredy', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011270', 'Lopez Herrera Juan Luis', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011271', 'Dominguez Barcenas Martha Elizabeth', 'Por contrato', '5');
INSERT INTO `maestro` VALUES ('S12011272', 'Garcia Vega Virginia Angelica', 'Por contrato', '5');

-- ----------------------------
-- Function structure for valTraslMaestro
-- ----------------------------
DROP FUNCTION IF EXISTS `valTraslMaestro`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `valTraslMaestro`(
	vNRC VARCHAR (5),
	vCLAVEHOR VARCHAR (10),
	vDIA VARCHAR (15),
	iHORA INT
) RETURNS int(11)
BEGIN
	DECLARE
		iNUMa VARCHAR (10); 
	DECLARE
		iNUMb VARCHAR (10);
		SET iNUMa = (
			SELECT
				carga.numMtro
			FROM
				carga
			WHERE
				carga.nrc = vNRC
		) ;
		SET iNUMb = (SELECT EXISTS(SELECT * FROM (
							SELECT
								carga.numMtro
							FROM
								carga
							JOIN (
								SELECT
									nrcEE
								FROM
									asignacion
								WHERE
									asignacion.horaAsig = iHORA
								AND asignacion.diaAsig = vDIA
								AND asignacion.claveHor != vCLAVEHOR
							) AS temp ON temp.nrcEE = carga.nrc) AS tempb WHERE tempb.numMtro = iNUMa));
RETURN iNUMb; 
END
;;
DELIMITER ;
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
