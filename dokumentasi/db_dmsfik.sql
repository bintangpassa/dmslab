/*
Navicat MySQL Data Transfer

Source Server         : bintang
Source Server Version : 100129
Source Host           : localhost:3306
Source Database       : db_dmsfik

Target Server Type    : MYSQL
Target Server Version : 100129
File Encoding         : 65001

Date: 2019-04-23 19:55:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aslab
-- ----------------------------
DROP TABLE IF EXISTS `aslab`;
CREATE TABLE `aslab` (
  `id_aslab` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nim_aslab` int(11) DEFAULT NULL,
  `bagian_aslab` char(255) DEFAULT NULL,
  `status_aslab` char(2) DEFAULT NULL,
  `terhapus_aslab` char(2) NOT NULL,
  PRIMARY KEY (`id_aslab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aslab
-- ----------------------------

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_aslab` int(11) DEFAULT NULL,
  `id_laboran` int(11) DEFAULT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `jenis_dokumen` char(255) DEFAULT NULL,
  `tgl_upload_dokumen` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status_dokumen` char(2) DEFAULT NULL,
  `terhapus_dokumen` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dokumen
-- ----------------------------

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nip_dosen` int(11) DEFAULT NULL,
  `jabatan_dosen` char(255) DEFAULT NULL,
  `status_dosen` char(2) DEFAULT NULL,
  `terhapus_dosen` char(2) DEFAULT NULL,
  `id_mk` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dosen
-- ----------------------------

-- ----------------------------
-- Table structure for laboran
-- ----------------------------
DROP TABLE IF EXISTS `laboran`;
CREATE TABLE `laboran` (
  `id_laboran` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nip_laboran` int(11) DEFAULT NULL,
  `jabatan_laboran` char(255) DEFAULT NULL,
  `status_laboran` char(2) DEFAULT NULL,
  `terhapus_laboran` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_laboran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of laboran
-- ----------------------------

-- ----------------------------
-- Table structure for matakuliah
-- ----------------------------
DROP TABLE IF EXISTS `matakuliah`;
CREATE TABLE `matakuliah` (
  `id_mk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mk` char(50) DEFAULT NULL,
  `nama_mk` varchar(255) DEFAULT NULL,
  `sks_mk` int(2) DEFAULT NULL,
  `semester_mk` int(2) DEFAULT NULL,
  `status_mk` int(2) DEFAULT NULL,
  `terhapus_mk` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of matakuliah
-- ----------------------------

-- ----------------------------
-- Table structure for prodi
-- ----------------------------
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` char(255) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prodi
-- ----------------------------
INSERT INTO `prodi` VALUES ('1', 'D3 Manajemen Informatika');
INSERT INTO `prodi` VALUES ('2', 'D3 Perhotelan');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` char(30) DEFAULT NULL,
  `password_user` char(64) DEFAULT NULL,
  `status_user` char(2) DEFAULT NULL,
  `level_user` int(3) DEFAULT NULL,
  `terhapus_user` char(2) DEFAULT NULL,
  `nama_lengkap_user` char(255) DEFAULT NULL,
  `email_user` char(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'okananda', 'ced9fc52441937264674bca3f4ba7588', 'y', '1', 'n', 'Okananda Rizky', 'bintangpassa@gmail.com');
INSERT INTO `user` VALUES ('2', 'kaur', '19501b2d2bedce911d6b1df8c19d3b74', 'y', '2', 'n', 'Hanung NP', 'kaur@gmail.com');
INSERT INTO `user` VALUES ('3', 'heru', '3f00fb76c1ff042382da5c933dd2014a', 'y', '3', 'n', 'Heru Nugroho', 'heru@gmail.com');
INSERT INTO `user` VALUES ('4', 'dea', '4b5af96d9d92ef6f0f9475186ed91bde', 'y', '4', 'n', 'Dea Ananda', 'dea@gmail.com');
