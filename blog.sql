/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-07-11 22:53:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', 'Hello World', 'Just a Article.\r\n\r\nnothing.', '1', '1', '1562833249', '1562850211');
INSERT INTO `article` VALUES ('2', '后端教材', 'php: http://www.w3school.com.cn/php/index.asp\r\nmysql: http://www.w3school.com.cn/sql/index.asp\r\nmvc设计思想（了解一下）: http://blog.sina.com.cn/s/blog_4b4cf2af0100ywjy.html\r\nthinkphp: https://www.kancloud.cn/manual/thinkphp5/118003', '1', '1', '1562851301', '1562851301');
INSERT INTO `article` VALUES ('3', '前端教材', 'html: http://www.w3school.com.cn/html/index.asp\r\ncss: http://www.w3school.com.cn/css/index.asp\r\njs: http://www.w3school.com.cn/b.asp\r\njquery: http://www.w3school.com.cn/jquery/index.asp\r\nbootstrap: https://www.runoob.com/bootstrap/bootstrap-tutorial.html', '1', '1', '1562851329', '1562851707');
INSERT INTO `article` VALUES ('4', 'Web开发软件下载', 'PhpStorm: https://www.jetbrains.com/phpstorm/?fromMenu\r\nPhpStudy: http://phpstudy.php.cn/download.html\r\nChrome: https://www.google.cn/chrome/', '1', '1', '1562851394', '1562851394');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '软件技术');
INSERT INTO `category` VALUES ('2', '网络技术');
INSERT INTO `category` VALUES ('3', '网络安全');
INSERT INTO `category` VALUES ('4', '运维技术');
INSERT INTO `category` VALUES ('5', '云计算技术');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `article_id` (`article_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '4', '1', 'test', '1562855425');
INSERT INTO `comment` VALUES ('2', '4', '1', 'zxczxczxczx', '1562855579');
INSERT INTO `comment` VALUES ('3', '4', '1', '123123123123', '1562855676');
INSERT INTO `comment` VALUES ('4', '4', '1', 'hhh', '1562855683');
INSERT INTO `comment` VALUES ('5', '3', '1', '测试', '1562856622');

-- ----------------------------
-- Table structure for friend_link
-- ----------------------------
DROP TABLE IF EXISTS `friend_link`;
CREATE TABLE `friend_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend_link
-- ----------------------------
INSERT INTO `friend_link` VALUES ('1', 'HsOjo的博客', 'http://blog.hsojo.com');
INSERT INTO `friend_link` VALUES ('2', 'GitHub', 'https://github.com');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'site_setting', '{\"site_name\":\"Simple Blog\",\"site_footer\":\"就是一个页尾而已啦。\"}');
INSERT INTO `setting` VALUES ('2', 'info_setting', '{\"blog_title\":\"简易ThinkPHP博客\",\"blog_description\":\"这是一个基于ThinkPHP5制作的一个简易博客\",\"about\":\"作者是个弱鸡。\\r\\n作者是个弱鸡。\\r\\n作者是个弱鸡。\\r\\n作者是个弱鸡。\\r\\n作者是个弱鸡。\"}');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `introduce` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `is_admin` (`is_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '123456', '1', 'admin@localhost', '123456', 'administrator');
INSERT INTO `user` VALUES ('2', 'user', '123456', '0', 'user@localhost', '123456', 'just a user');
