/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.4.27-MariaDB : Database - e_vote
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`e_vote` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `e_vote`;

/*Table structure for table `t_admin` */

DROP TABLE IF EXISTS `t_admin`;

CREATE TABLE `t_admin` (
  `id_admin` tinyint(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `t_admin` */

insert  into `t_admin`(`id_admin`,`username`,`fullname`,`password`) values 
(1,'Daru','Anandaru','$2y$10$uu4PALmxMtmjikt5YUoSuun7daAb1gYGcIajJlznUjF73aXE0QyzC');

/*Table structure for table `t_kandidat` */

DROP TABLE IF EXISTS `t_kandidat`;

CREATE TABLE `t_kandidat` (
  `id_kandidat` smallint(4) NOT NULL AUTO_INCREMENT,
  `nama_calon` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `suara` smallint(4) NOT NULL DEFAULT 0,
  `periode` varchar(9) NOT NULL,
  PRIMARY KEY (`id_kandidat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `t_kandidat` */

insert  into `t_kandidat`(`id_kandidat`,`nama_calon`,`foto`,`visi`,`misi`,`suara`,`periode`) values 
(1,'Dona/Donu','0.31457000 1681321529.png','Gajah Mada','History',0,'2023/2024'),
(2,'Dara/Doro','0.32613600 1681321566.png','kian santang','sarua',1,'2023/2024');

/*Table structure for table `t_pemilih` */

DROP TABLE IF EXISTS `t_pemilih`;

CREATE TABLE `t_pemilih` (
  `nim` varchar(10) NOT NULL,
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `t_pemilih` */

insert  into `t_pemilih`(`nim`,`periode`) values 
('A10001','2023/2024');

/*Table structure for table `t_semester` */

DROP TABLE IF EXISTS `t_semester`;

CREATE TABLE `t_semester` (
  `id_semester` varchar(3) NOT NULL,
  `jml_semester` varchar(200) NOT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `t_semester` */

insert  into `t_semester`(`id_semester`,`jml_semester`) values 
('SO1','Semester - 1'),
('SO2','Semester - 2'),
('SO3','Semester - 3'),
('SO4','Semester - 4'),
('SO5','Semester - 5'),
('SO6','Semester - 6'),
('SO7','Semester - 7'),
('SO8','Semester - 8');

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id_user` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `id_semester` varchar(3) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `pemilih` enum('Y','N') NOT NULL DEFAULT 'Y',
  `pass` varchar(20) NOT NULL DEFAULT 'pass',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `t_user` */

insert  into `t_user`(`id_user`,`fullname`,`id_semester`,`jk`,`pemilih`,`pass`) values 
('A0002','Dara','SO4','P','Y','A0002'),
('A0003','Doro','SO4','P','Y','A0003'),
('A0004','Dona','SO8','P','Y','A0004'),
('A0005','gajah mada','SO2','L','Y','A0005'),
('A10001','Daru','SO4','L','Y','A10001');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
