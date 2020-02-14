/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100110
 Source Host           : localhost:3306
 Source Schema         : cms

 Target Server Type    : MySQL
 Target Server Version : 100110
 File Encoding         : 65001

 Date: 14/02/2020 02:17:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions`  (
  `id` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for config_system
-- ----------------------------
DROP TABLE IF EXISTS `config_system`;
CREATE TABLE `config_system`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_system
-- ----------------------------
INSERT INTO `config_system` VALUES (1, 'title', 'title', 'cms gue', '0');
INSERT INTO `config_system` VALUES (2, 'telepon', 'telepon', '085288882994', '0');
INSERT INTO `config_system` VALUES (3, 'email', 'email', 'mpampam5@mail.com', '0');
INSERT INTO `config_system` VALUES (4, 'domain', 'domain', 'www.tester.com', '0');
INSERT INTO `config_system` VALUES (5, 'alamat', 'alamat', 'jl. muhajirin raya', '0');
INSERT INTO `config_system` VALUES (51, 'email_smtp', 'email_smtp', 'mpampam5@gmail.com', '0');
INSERT INTO `config_system` VALUES (52, 'host_smtp', 'host_smtp', 'ssl://niagahoster.com', '0');
INSERT INTO `config_system` VALUES (53, 'port_smtp', 'port_smtp', '465', '0');
INSERT INTO `config_system` VALUES (54, 'password_smtp', 'password_smtp', 'A1kA1DfFtZ0EimcxcDlhVj9VA1G8Idd7l5Iktqj2jxhDW6+v08X5BTguLYpiYu305oU2POZY1AGwL/1BEnOa5g==', '0');
INSERT INTO `config_system` VALUES (55, 'status_smtp', 'status_smtp', NULL, '0');
INSERT INTO `config_system` VALUES (99, 'maintenance', 'maintenance', NULL, '0');

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level`  (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES (1, 'xadmin', 'xadmin', '2020-02-14 00:03:45', NULL);
INSERT INTO `level` VALUES (2, 'superadmin', 'superadmin', '2020-02-14 00:00:08', '0000-00-00 00:00:00');
INSERT INTO `level` VALUES (3, 'admin', 'admin', '2020-02-14 00:00:41', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for rule_level
-- ----------------------------
DROP TABLE IF EXISTS `rule_level`;
CREATE TABLE `rule_level`  (
  `id_rule_level` int(11) NOT NULL,
  `id_level` int(11) NULL DEFAULT NULL,
  `main_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rule_level`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `created` datetime(0) NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  `is_delete` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'superadmin', 'superadmin@mail.com', '123456', '123456', '0', '2020-02-14 00:01:19', NULL, '0');

-- ----------------------------
-- Table structure for user_level
-- ----------------------------
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level`  (
  `id_user_level` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_level`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_level
-- ----------------------------
INSERT INTO `user_level` VALUES (1, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
