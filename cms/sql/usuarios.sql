/*
Navicat MySQL Data Transfer

Source Server         : Publix - BANCO 008 - ALFA
Source Server Version : 50154
Source Host           : 186.202.152.8:3306
Source Database       : publixcomunica8

Target Server Type    : MYSQL
Target Server Version : 50154
File Encoding         : 65001

Date: 2013-03-26 11:54:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `sobrenome` varchar(70) COLLATE latin1_general_ci DEFAULT NULL,
  `login` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `senha` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `UltimoLogon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'SÃ©rgio', 'Monteiro', 'serginho', '83cce229d298fad8cb43fd4b41f8564c', 'sergio@publixcomunicacao.com.br', '2013-03-18 11:21:36');
