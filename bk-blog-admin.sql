/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : bk-blog-admin

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 23/09/2019 21:01:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bk_article
-- ----------------------------
DROP TABLE IF EXISTS `bk_article`;
CREATE TABLE `bk_article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `catagory_id` int(11) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `create_time` datetime(0) DEFAULT NULL,
  `update_time` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10003 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bk_article
-- ----------------------------
INSERT INTO `bk_article` VALUES (10000, '该或能各却', '北红员于需来任变积给今断军价适。王需际心况先记感且积会体代新型。反点连政此间例究克价场住七称门元原。百可部管持白且队合斗红系风带亲什。场基五具石温车战照安华证他权支。需她四定对研反已图及程增量儿几专。', '京证百运前解南式育酸毛议。增知究日外厂作按往存道至般此就。', 'http://dummyimage.com/200x100/50B347/FFF&text=Mock.js', 4, 1, 0, 137, 418, '1984-01-23 12:18:27', '1978-04-15 08:47:54');
INSERT INTO `bk_article` VALUES (10001, '除深道器质问', '资亲总极米交记积式定飞分级了族。水县面统林越象条志角老往认酸要。间它状放究两动多究年建者同。文置非儿代较也保六会九整没做。影位高力看花定王走带单各层和克压子。适必实产所较华三回约花例铁车在数。', '约业得家改半比或需发听连矿名产。段手了体位政分电志比热王起。', 'http://dummyimage.com/200x100/50B347/FFF&text=Mock.js', 5, 1, 0, 485, 330, '1971-09-18 12:20:01', '2005-07-30 11:41:57');
INSERT INTO `bk_article` VALUES (10002, '同最数更', '体些日相厂门天改积少地权八展四共。争是厂商党根布安家维会效论保土因到。张问不象斯当效家义张领了些应。光专学次万给取志式张七影听。十议议整求已复样米干利约。被还力导白到海产件长便产物。', '给只片对装华世求本心需状响红求众自。间称转了从效北影表加切技。', 'http://dummyimage.com/200x100/50B347/FFF&text=Mock.js', 6, 1, 0, 109, 215, '2010-11-27 14:36:05', '2018-09-14 11:14:32');
INSERT INTO `bk_article` VALUES (10003, '测试文章', '没有文章内容\n', '这是一个测试文章', 'http://dummyimage.com/200x100/50B347/FFF&text=Mock.js', 0, 0, 0, NULL, NULL, '2019-09-22 16:00:00', NULL);

-- ----------------------------
-- Table structure for bk_author
-- ----------------------------
DROP TABLE IF EXISTS `bk_author`;
CREATE TABLE `bk_author`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comment` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `create_time` datetime(0) NOT NULL,
  `last_login_time` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `usernameIndex`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bk_author
-- ----------------------------
INSERT INTO `bk_author` VALUES (4, 'admin', '1234abcd', '1209418977@qq.com', NULL, NULL, '0000-00-00 00:00:00', NULL);

-- ----------------------------
-- Table structure for bk_category
-- ----------------------------
DROP TABLE IF EXISTS `bk_category`;
CREATE TABLE `bk_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_time` datetime(0) NOT NULL,
  `updated_time` datetime(0) NOT NULL,
  `deleted_time` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for bk_comment
-- ----------------------------
DROP TABLE IF EXISTS `bk_comment`;
CREATE TABLE `bk_comment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `nickname` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` varchar(1023) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `like` int(11) NOT NULL DEFAULT 0,
  `email` varchar(320) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `created_time` datetime(0) NOT NULL,
  `updated_time` datetime(0) NOT NULL,
  `deleted_time` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for bk_tag
-- ----------------------------
DROP TABLE IF EXISTS `bk_tag`;
CREATE TABLE `bk_tag`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_time` datetime(0) NOT NULL,
  `updated_time` datetime(0) NOT NULL,
  `deleted_time` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
