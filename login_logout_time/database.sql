/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.25-MariaDB : Database - log_managment
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`log_managment` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `log_managment`;

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `logs` */

insert  into `logs`(`log_id`,`login_time`,`logout_time`,`user_id`) values 
(1,'2024-03-29 23:43:01','0000-00-00 00:00:00',3),
(2,'2024-03-29 23:55:56','2024-03-29 23:59:39',3),
(3,'2024-03-29 23:59:45','2024-03-30 00:02:08',1),
(4,'2024-03-30 00:02:25','2024-03-30 00:02:37',2),
(5,'2024-03-30 00:02:46','2024-03-30 00:08:08',1),
(6,'2024-03-30 00:08:30','2024-03-30 00:08:51',4),
(7,'2024-03-30 00:09:01','2024-03-30 00:09:32',2),
(8,'2024-03-30 00:09:40','2024-03-30 00:09:53',4),
(9,'2024-03-30 00:10:01','2024-03-30 00:10:22',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`user_id`,`name`,`email`,`password`,`role`) values 
(1,'Talha','talha@gmail.com','talha','admin'),
(2,'qasim','qasim@gmail.com','qasim','user'),
(3,'moiz','moiz@gmail.com','moiz','user'),
(4,'ahsan','ahsan@gmail.com','ahsan','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
