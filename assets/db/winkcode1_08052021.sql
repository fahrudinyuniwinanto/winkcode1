/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : winkcode1

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 08/05/2021 13:44:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kat` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `for_modul` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (2, 'Kategori b', '-', '-');
INSERT INTO `kategori` VALUES (4, 'Desa', '-', 'jenis_lokasi');
INSERT INTO `kategori` VALUES (5, 'Radio', '-', 'jenis_perangkat');
INSERT INTO `kategori` VALUES (6, 'Kecamatan', '', 'jenis_lokasi');
INSERT INTO `kategori` VALUES (7, 'OPD', '', 'jenis_lokasi');
INSERT INTO `kategori` VALUES (8, 'PDE', '', 'jenis_perangkat');
INSERT INTO `kategori` VALUES (9, 'Access Point', '', 'jenis_perangkat');
INSERT INTO `kategori` VALUES (10, 'Router', '', 'jenis_perangkat');
INSERT INTO `kategori` VALUES (11, 'Repeater Bojong', '', 'jenis_perangkat');

-- ----------------------------
-- Table structure for master_access
-- ----------------------------
DROP TABLE IF EXISTS `master_access`;
CREATE TABLE `master_access`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_access` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_access
-- ----------------------------
INSERT INTO `master_access` VALUES (1, 'M_USER', 'MENU USER', '0000-00-00 00:00:00', 0);
INSERT INTO `master_access` VALUES (2, 'M_MASTER', 'MENU MASTER', NULL, NULL);
INSERT INTO `master_access` VALUES (3, 'M_SERVER', 'MENU MONITORING SERVER', '0000-00-00 00:00:00', 0);
INSERT INTO `master_access` VALUES (4, 'M_JAR', 'MENU MONITORING JARINGAN', '0000-00-00 00:00:00', 0);
INSERT INTO `master_access` VALUES (5, 'M_LAPORAN', 'MENU LAPORAN', NULL, NULL);
INSERT INTO `master_access` VALUES (6, 'M_SISTEM', 'MENU SISTEM', NULL, NULL);

-- ----------------------------
-- Table structure for sy_config
-- ----------------------------
DROP TABLE IF EXISTS `sy_config`;
CREATE TABLE `sy_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `conf_val` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sy_config
-- ----------------------------
INSERT INTO `sy_config` VALUES (3, 'APP_NAME', 'Winkcode 1 Framework', '');
INSERT INTO `sy_config` VALUES (8, 'OPD_NAME', 'Peternak Kode', '');
INSERT INTO `sy_config` VALUES (9, 'LEFT_FOOTER', '<strong>Copyright</strong> <a href=\"http://www.youtube.com/peternakkode\" target=\"_blank\">Peternak Kode</a> © 2019', '');
INSERT INTO `sy_config` VALUES (10, 'RIGHT_FOOTER', 'Codeigniter 3 + Harviacode + SfHelper + SfJs', '');
INSERT INTO `sy_config` VALUES (11, 'VISI_MISI', 'Dilengkapi dengan tambahan helper PHP dan JS', '');
INSERT INTO `sy_config` VALUES (12, 'OPD_ADDR', '<a href=\"http://www.youtube.com/peternakkode\" target=\"_blank\">Peternak Kode</a>', '');

-- ----------------------------
-- Table structure for sy_menu
-- ----------------------------
DROP TABLE IF EXISTS `sy_menu`;
CREATE TABLE `sy_menu`  (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `redirect` int(1) NULL DEFAULT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `parent` int(11) NULL DEFAULT 0,
  `icon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `note` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `order_no` int(5) NULL DEFAULT NULL,
  `created_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sy_menu
-- ----------------------------
INSERT INTO `sy_menu` VALUES (5, 'Menu Config', 0, 'sy_menu', 0, 'fa-wrench', '', 10, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (6, 'Dashboard', 0, 'backend', 0, 'fa-home', '', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (10, 'Category', 0, 'kategori', 0, 'fa-th-list', '', 4, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (13, 'Parameter System', 0, 'sy_config', 0, 'fa-gears', '', 9, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (14, 'Users', 0, 'users', 18, 'fa-users', '', 9, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (15, 'Group Users', 0, 'user_group', 18, 'fa-users', '', 9, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (16, 'User Access', 0, 'user_access', 18, 'fa fa-user', '', 8, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (17, 'Master Access', 0, 'master_access', 18, 'fa fa-key', '', 9, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `sy_menu` VALUES (18, 'Management Users', 0, 'users', 0, 'fa fa-users', '', 9, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for user_access
-- ----------------------------
DROP TABLE IF EXISTS `user_access`;
CREATE TABLE `user_access`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NULL DEFAULT NULL,
  `kd_access` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nm_access` varbinary(100) NULL DEFAULT NULL,
  `is_allow` int(1) NULL DEFAULT NULL COMMENT '0=false,1=true',
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_access
-- ----------------------------
INSERT INTO `user_access` VALUES (5, 2, '1', NULL, 0, NULL);
INSERT INTO `user_access` VALUES (8, 1, '1', NULL, 1, NULL);
INSERT INTO `user_access` VALUES (9, 1, '4', NULL, 1, NULL);

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (1, 'Developer', 'full akses', NULL, NULL, NULL, NULL);
INSERT INTO `user_group` VALUES (2, 'Administrator', 'Admin Aplikasi', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_group` int(11) NULL DEFAULT NULL COMMENT 'fk dari tabel user_group',
  `foto` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `note_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin Jaringan', 'dev', '227edf7c86c02a44d17eec9aa5b30cd1', 'dev@email.com', 1, 'a4.jpg', '085643242654', '-', 1, 1, '2018-03-13 03:06:55', '2019-01-31 11:09:12', '');
INSERT INTO `users` VALUES (2, 'Kepala', 'kepala', '836b1f7f9b7f9bf98f1f645302defc59', 'kepalasimpjari@gmail.com', 0, '', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

SET FOREIGN_KEY_CHECKS = 1;
