/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.2.14-MariaDB : Database - si_armada
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`si_armada` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `si_armada`;

/*Table structure for table `master_armada` */

DROP TABLE IF EXISTS `master_armada`;

CREATE TABLE `master_armada` (
  `id_armada` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(20) NOT NULL,
  `no_lambung` varchar(100) NOT NULL,
  `no_stnk` varchar(100) NOT NULL,
  `tahun` int(5) unsigned NOT NULL,
  `trayek` varchar(100) NOT NULL,
  `jenis_trayek` enum('AKAP','AKDP','PARIWISATA','MPU') NOT NULL DEFAULT 'AKAP',
  PRIMARY KEY (`id_armada`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `master_armada` */

/*Table structure for table `master_sparepart` */

DROP TABLE IF EXISTS `master_sparepart`;

CREATE TABLE `master_sparepart` (
  `id_sp` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_sp` varchar(100) NOT NULL,
  `nama_sp` varchar(255) NOT NULL,
  `stock_sp` int(11) unsigned NOT NULL,
  `status` enum('READY','KOSONG') NOT NULL DEFAULT 'READY',
  PRIMARY KEY (`id_sp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `master_sparepart` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('USER','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`password`,`role`,`email`,`is_active`,`created_at`,`updated_at`) values 
(1,'johan','$2y$12$oYWuOCSjAB7GOGgSByolLufKKg6XAUxMyhXlceNUaj0DBGh/46vCa','USER','johan@gmail.com',1,'2024-02-13 10:02:22','2024-02-13 10:02:22'),
(2,'anton','$2y$12$4UMtD3zg/qlXVn34LRls1OgNSoHzsDQg8DkcVKbn882UPUDPCBuHu','USER','anton@gmail.com',1,'2024-02-13 10:08:01','2024-02-13 10:08:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
