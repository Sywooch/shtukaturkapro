/*
 Navicat Premium Data Transfer

 Source Server         : MySQL Vagrant
 Source Server Type    : MySQL
 Source Server Version : 50623
 Source Host           : 127.0.0.1
 Source Database       : shtukaturkapro_db

 Target Server Type    : MySQL
 Target Server Version : 50623
 File Encoding         : utf-8

 Date: 02/28/2015 20:41:29 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `config`
-- ----------------------------
BEGIN;
INSERT INTO `config` VALUES ('1', 'facebookLink', 'http://facebook.com'), ('2', 'vkLink', 'http://vk.com'), ('3', 'googlePlusLink', 'http://google.com'), ('4', 'siteName', 'Штукатурка про'), ('5', 'mainKeywords', 'Ключики'), ('6', 'mainDescription', 'Описание'), ('7', 'categoryImageShow', '1'), ('8', 'adminName', 'root'), ('9', 'adminPassword', '$2y$13$zY2JFrdgJDA3NYERztu./.bWeKnBgUZ2kL0.ZU6qJ8eY8E8xI1Uz.');
COMMIT;

-- ----------------------------
--  Table structure for `faq`
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(64) DEFAULT NULL COMMENT 'Nick',
  `userEmail` varchar(128) DEFAULT NULL COMMENT 'Email',
  `question` text COMMENT 'Вопрос',
  `answer` text COMMENT 'Ответ',
  `dateCreate` datetime DEFAULT NULL COMMENT 'Дата вопроса',
  `dateAnswer` datetime DEFAULT NULL COMMENT 'Дата ответа',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL COMMENT 'Заголовок',
  `url` varchar(256) DEFAULT NULL COMMENT 'Адрес',
  `content` mediumtext COMMENT 'Содержание',
  `image` varchar(256) DEFAULT NULL COMMENT 'Иконка',
  `metaKeywords` varchar(256) DEFAULT NULL COMMENT 'Мета - ключевые слова',
  `metaDescription` text COMMENT 'Мета - содержание',
  `metaTitle` varchar(256) DEFAULT NULL COMMENT 'Мета - заголовок',
  `views` int(10) unsigned DEFAULT NULL COMMENT 'Просмотры',
  `position` tinyint(4) DEFAULT NULL COMMENT 'Позиция',
  `categoryId` int(11) unsigned DEFAULT NULL COMMENT 'Категория',
  PRIMARY KEY (`id`),
  KEY `ixUrl` (`url`(255)) COMMENT 'Адрес',
  KEY `ixViews` (`views`) COMMENT 'Просмотры',
  KEY `ixCategory` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `post`
-- ----------------------------
BEGIN;
INSERT INTO `post` VALUES ('1', 'Вторая запись', 'vtoraya-zapis', '', '', '', '', '', null, null, '3');
COMMIT;

-- ----------------------------
--  Table structure for `postCategory`
-- ----------------------------
DROP TABLE IF EXISTS `postCategory`;
CREATE TABLE `postCategory` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL COMMENT 'Заголовок',
  `url` varchar(256) DEFAULT NULL COMMENT 'Адрес',
  `content` mediumtext COMMENT 'Содержание',
  `image` varchar(256) DEFAULT NULL COMMENT 'Иконка',
  `metaKeywords` varchar(256) DEFAULT NULL COMMENT 'Мета - ключевые слова',
  `metaDescription` text COMMENT 'Мета - содержание',
  `metaTitle` varchar(256) DEFAULT NULL COMMENT 'Мета - заголовок',
  `views` int(10) unsigned DEFAULT NULL COMMENT 'Просмотры',
  `position` tinyint(4) DEFAULT NULL COMMENT 'Позиция',
  PRIMARY KEY (`id`),
  KEY `ixUrl` (`url`(255)) COMMENT 'Адрес',
  KEY `ixViews` (`views`) COMMENT 'Просмотры'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `postCategory`
-- ----------------------------
BEGIN;
INSERT INTO `postCategory` VALUES ('1', 'Первая категория', 'pervaya-kategoriya', '', '', '', '', '', null, null), ('3', 'Вторая', 'vtoraya', '', '', '', '', '', null, null), ('4', 'Новая категория', 'novaya-kategoriya', '', 'novaya-kategoriya.jpg', '', '', '', null, null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
